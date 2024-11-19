<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->increments('idDestination'); 
            $table->string('Name_Destination', 225);
            $table->string('Locations', 225);
            $table->string('Description', 1500);
            $table->string('Price_perticket', 20);
            $table->string('Available_seat', 5);
            $table->string('Image', 100);
            $table->enum('Category',['Wisata Sejarah dan Budaya', 'Wisata Alam dan Taman', 'Wisata Modern dan Hiburan', 'Wisata Religi']);
            $table->string('Opening_hours', 225);
            $table->dateTime('tgl');
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('idBookings'); 
            $table->unsignedBigInteger('users_id'); 
            $table->unsignedInteger('destinations_id'); 
            $table->dateTime('booking_date');
            $table->string('total_price', 225);
            $table->integer('number_of_ticket');
            $table->boolean('payment_status');
            $table->integer('booking_code');
        
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('destinations_id')->references('idDestination')->on('destinations')->onDelete('cascade');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->increments('idpayment');
            $table->unsignedInteger('bookings_id'); 
            $table->string('amount', 225);
            $table->string('payment_method', 225);
            $table->dateTime('payment_date');
            $table->integer('transaction_id');
        
            $table->foreign('bookings_id')->references('idBookings')->on('bookings')->onDelete('cascade');
        });

        Schema::create('transaction', function (Blueprint $table) {
            $table->id('idtransaction'); 
            $table->unsignedInteger('payment_id')->nullable();
            $table->unsignedBigInteger('users_id'); 
            $table->boolean('transaction_type');
            $table->decimal('amounts', 10, 2); 
            $table->dateTime('transaction_date');
            $table->boolean('status');
            $table->string('remarks', 1500)->nullable();
            $table->timestamps();
        
            $table->foreign('payment_id')->references('idpayment')->on('payments')->onDelete('set null');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade'); // Asumsi users ada pada tabel 'users'
        });

        Schema::create('e_tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->unsignedInteger('bookings_id'); 
            $table->unsignedBigInteger('users_id'); 
            $table->unsignedInteger('destination_id'); 
            $table->integer('ticket_code');
            $table->dateTime('issue_date');
            $table->dateTime('valid_until');
            $table->string('qr_code', 500)->nullable();
            $table->boolean('statuss');
            $table->timestamps();
        
            $table->foreign('bookings_id')->references('idBookings')->on('bookings')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('destination_id')->references('idDestination')->on('destinations')->onDelete('cascade');
        });
   
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
