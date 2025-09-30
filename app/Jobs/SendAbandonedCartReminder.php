<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail; // ✅ yeh zaroori hai
use App\Mail\AbandonedCartMail;      // ✅ mail class import

class SendAbandonedCartReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $cart;

    /**
     * Create a new job instance.
     */
    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->cart->email)->send(new AbandonedCartMail($this->cart));
    }
}
