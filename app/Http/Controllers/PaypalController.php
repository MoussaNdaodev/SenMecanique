<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Cart;
use App\Models\Product;

class PaypalController extends Controller
{
    public function payment()
    {
        $cart = Cart::where('user_id', auth()->user()->id)
                    ->where('order_id', null)
                    ->get();

        // Préparer les éléments de la commande
        $items = $cart->map(function ($item) {
            $product = Product::find($item->product_id);
            return [
                'name' => $product ? $product->title : 'Unknown Product',
                'unit_amount' => [
                    'currency_code' => 'USD',
                    'value' => number_format($item->price, 2, '.', ''), // Assurez-vous que la valeur est bien formatée
                ],
                'quantity' => (int) $item->quantity, // Assurez-vous que la quantité est un entier
            ];
        })->toArray();

        // Calculer le total
        $total = $cart->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $orderData = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format($total, 2, '.', ''),
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'USD',
                                'value' => number_format($total, 2, '.', ''),
                            ],
                        ],
                    ],
                    'items' => $items,
                ],
            ],
            'application_context' => [
                'return_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ],
        ];

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        try {
            $response = $provider->createOrder($orderData);
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()->back()->with('error', 'Unable to process the payment. Please try again. Error: ' . $e->getMessage());
        }

        if (isset($response['id'])) {
            $approvalUrl = collect($response['links'])
                            ->where('rel', 'approve')
                            ->first()['href'];

            return redirect($approvalUrl); // Redirection vers PayPal
        } else {
            return redirect()->back()->with('error', 'Unable to process the payment. Please try again.');
        }
    }

    public function cancel()
    {
        return redirect()->route('home')->with('error', 'Your payment was canceled. Please try again.');
    }

    public function success(Request $request)
    {
        $orderId = $request->query('token');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        try {
            $response = $provider->captureOrder($orderId);
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()->back()->with('error', 'Payment capture failed. Please try again. Error: ' . $e->getMessage());
        }

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            request()->session()->flash('success', 'You successfully paid with PayPal! Thank you.');
            session()->forget('cart');
            session()->forget('coupon');
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Payment capture failed. Please try again.');
        }
    }
}
