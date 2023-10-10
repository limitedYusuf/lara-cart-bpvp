<?php

namespace App\Traits;

trait CartTrait
{
   public function addToCart($item)
   {
      $cart = session()->get('cart', []);

      if (isset($cart[$item['id']])) {
         $cart[$item['id']]['quantity'] += $item['quantity'];
      } else {
         $cart[$item['id']] = [
            'name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $item['quantity'],
         ];
      }

      session()->put('cart', $cart);
   }

   public function getCart()
   {
      return session()->get('cart', []);
   }

   public function removeFromCart($itemId)
   {
      $cart = session()->get('cart', []);

      if (isset($cart[$itemId])) {
         unset($cart[$itemId]);
      }

      session()->put('cart', $cart);
   }
}
