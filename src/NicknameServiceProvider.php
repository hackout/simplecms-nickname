<?php

namespace SimpleCMS\Nickname;

use Illuminate\Support\ServiceProvider;

class NicknameServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->bootConfig();
        $this->loadFacades();
    }

    /**
     * 绑定Facades
     *
     * @author Dennis Lui <hackout@vip.qq.com>
     * @return void
     */
    protected function loadFacades(): void
    {
        $this->app->bind('nickname', fn() => new \SimpleCMS\Nickname\Packages\Nickname);
    }

    /**
     * 初始化配置文件
     * @return void
     */
    protected function bootConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/cms_nickname.php' => config_path('cms_nickname.php'),
        ], 'simplecms');
    }
}
