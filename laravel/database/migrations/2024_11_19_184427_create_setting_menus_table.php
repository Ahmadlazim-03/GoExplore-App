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
            $table->string('Link_Location');
            $table->string('Description', 1500);
            $table->string('Price_perticket', 20);
            $table->string('Available_seat', 5);
            $table->string('Image', 100);
            $table->enum('Category',['Wisata Sejarah dan Budaya', 'Wisata Alam dan Taman', 'Wisata Modern dan Hiburan', 'Wisata Religi']);
            $table->string('Opening_hours', 225);
            $table->dateTime('tgl');
            $table->timestamps();
        });

        Schema::create('detail_destinations', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedInteger('destinations_id'); 
            $table->json('image')->nullable(); 
            $table->longText('description')->nullable(); 
            $table->string('video')->nullable(); 
            $table->enum('rating',[1,2,3,4,5])->nullable(); 
            $table->timestamps();
            $table->foreign('destinations_id')
                  ->references('idDestination')
                  ->on('destinations')
                  ->onDelete('cascade');
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


        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->integer('count');
            $table->integer('qty');
            $table->bigInteger('total_price')->nullable();
            $table->string('date');
            $table->enum('status',['Unpaid','Paid'])->nullable();
            $table->timestamps();
        });


        Schema::create('e_tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->unsignedBigInteger('users_id'); 
            $table->unsignedInteger('destination_id'); 
            $table->string('ticket_code')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->dateTime('valid_until')->nullable();
            $table->string('qr_code', 500)->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('destination_id')->references('idDestination')->on('destinations')->onDelete('cascade');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
   
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
        Schema::dropIfExists('detail_destinations');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('roles');
    }
};
