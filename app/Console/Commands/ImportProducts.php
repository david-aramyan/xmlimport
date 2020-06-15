<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info(date('Y-m-d h:i:s'));
        $files = Storage::files('data');

        foreach ($files as $filename) {


        $file = simplexml_load_string(Storage::get($filename));
        $cityId = substr($filename,11,1);

        if (strpos($filename, 'import') !== false) {
            $products = $file->Каталог->Товары->children();

            foreach ($products as $product) {
                $code = trim($product->Код);
                $name = $product->Наименование;
                $weight = $product->Вес;
                $usageString = '';

                if (isset($product->Взаимозаменяемости)) {
                    $usages = $product->Взаимозаменяемости->children();

                    $count = 0;
                    foreach ($usages as $usage) {
                        $usageString .= $usage->Марка . '-' . $usage->Модель . '-' . $usage->КатегорияТС;
                        if ($count != count($usages) - 1) {
                            $usageString .= '|';
                        }
                        $count++;
                    }
                }


                Product::updateOrCreate(
                    ['code' => $code],
                    ['name' => $name, 'weight' => $weight, 'usage' => $usageString]
                );

                $this->info("Code: {$code} - product info created or updated");
            }
        } elseif (strpos($filename, 'offers') !== false) {
            $offers = $file->ПакетПредложений->Предложения->children();

            foreach ($offers as $offer) {
                $code = trim($offer->Код);
                $quantity = $offer->Количество;
                $price = $offer->Цены->children()[0]->ЦенаЗаЕдиницу;

                Product::updateOrCreate(
                    ["code" => $code],
                    ["quantity_{$cityId}" => $quantity, "price_{$cityId}" => $price]
                );

                $this->info("Code: {$code} - offer info created or updated");
            }
        }
        }
        $this->info(date('Y-m-d h:i:s'));
    }
}
