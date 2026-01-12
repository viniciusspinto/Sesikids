<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeedbackFieldsToFeedbackTable extends Migration
{
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            if (!Schema::hasColumn('feedback', 'name')) {
                $table->string('name')->nullable()->after('id');
            }
            if (!Schema::hasColumn('feedback', 'descricao')) {
                $table->text('descricao')->nullable()->after('name');
            }
            if (!Schema::hasColumn('feedback', 'rating')) {
                $table->tinyInteger('rating')->nullable()->after('descricao');
            }
            if (!Schema::hasColumn('feedback', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('rating');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            if (Schema::hasColumn('feedback', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('feedback', 'rating')) {
                $table->dropColumn('rating');
            }
            if (Schema::hasColumn('feedback', 'descricao')) {
                $table->dropColumn('descricao');
            }
            if (Schema::hasColumn('feedback', 'name')) {
                $table->dropColumn('name');
            }
        });
    }
}