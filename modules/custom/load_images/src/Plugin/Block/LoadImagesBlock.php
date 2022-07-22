<?php

/**
 * @file
 * LoadImagesBlock
 */

namespace Drupal\load_images\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'LoadImagesBlock' block
 * 
 * @Block(
 * id = "load_images_block",
 * admin_label = @Translation("Load Images block"),
 * category = @Translation("Load Images"),
 * )
 */

 class LoadImagesBlock extends BlockBase{
     /**
     * {@inheritdoc}
     */

     public function build(){
        $html = '<div class="row"><h2>Developers</h2>';

        $urlAPI = 'https://www.mockachino.com/c17a4013-635a-43/developers';

        $data = file_get_contents($urlAPI);
        $json = json_decode($data, TRUE);

        for ($i=1; $i < 4; $i++) { 
            $name = $json['developers'][$i]['first_name'];
            $lastname = $json['developers'][$i]['last_name'];
            $image = $json['developers'][$i]['image'];

            $htmlname = "<p>$name $lastname</p>";
            $htmlimage = "<img class='dev-images' alt='$name $lastname' src='$image'/>";
            $htmldiv = "<div class='devs-container'>$htmlimage $htmlname</div>";

            $html = $html.$htmldiv;
        }

        $html = $html.'</div>';

        return [
            '#type' => 'markup',
            '#markup' => $this -> t('
                <div class="container">
                    '. $html .'                        
                </div>
            '),
        ];
     }
 }