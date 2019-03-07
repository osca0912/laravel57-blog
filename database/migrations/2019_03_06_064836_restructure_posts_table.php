<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructurePostsTable extends Migration
{
    /*
     * subtitle：文章副标题
        content_raw：Markdown 格式文本
        content_html：使用 Markdown 编辑内容但同时保存 HTML 版本
        page_image：文章缩略图（封面图）
        meta_description：文章备注说明
        is_draft：该文章是否是草稿
        layout：使用的布局
     */
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('subtitle')->after('title');
            $table->renameColumn('content', 'content_raw');
            $table->text('content_html')->after('content');
            $table->string('page_image')->after('content_html');
            $table->string('meta_description')->after('page_image');
            $table->boolean('is_draft')->after('meta_description');
            $table->string('layout')->after('is_draft')->default('blog.layouts.post');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('layout');
            $table->dropColumn('is_draft');
            $table->dropColumn('meta_description');
            $table->dropColumn('page_image');
            $table->dropColumn('content_html');
            $table->renameColumn('content_raw', 'content');
            $table->dropColumn('subtitle');
        });
    }
}