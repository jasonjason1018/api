<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeService extends Command
{
    /**
     * 命令的名稱
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * 命令的描述
     *
     * @var string
     */
    protected $description = '建立一個新的 Service 類別';

    /**
     * 檔案系統處理
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * 建構子
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * 執行命令
     */
    public function handle()
    {
        // 取得服務類別名稱
        $name = $this->argument('name');
        $servicePath = app_path("Services/{$name}.php");

        // 檢查 Service 是否已經存在
        if ($this->files->exists($servicePath)) {
            $this->error("Service {$name} 已經存在！");
            return false;
        }

        // 建立 Services 資料夾（如果不存在）
        if (!$this->files->isDirectory(app_path('Services'))) {
            $this->files->makeDirectory(app_path('Services'), 0755, true);
        }

        // 產生 Service 類別檔案
        $this->files->put($servicePath, $this->generateServiceClass($name));

        $this->info("Service {$name} 建立成功！");
    }

    /**
     * 產生 Service 類別的內容
     */
    protected function generateServiceClass($name)
    {
        return <<<PHP
<?php

namespace App\Services;

class {$name}
{
    public function __construct()
    {
        //
    }
}
PHP;
    }
}
