<?php

/*
Create custom meta-box. (this custom block will be in 'Edit Car page' on side bar)
*/
add_action( 'add_meta_boxes','wpl_register_metabox');
function wpl_register_metabox(){
    add_meta_box('car-id', 'Car Details', 'wpl_car_details_calls', 'car', 'side','high');
}



//add inputs for Car Details meta-box =======================================================
function wpl_car_details_calls($post){
    ?>

<p>
    <label for="wp_color_picker">Color your car</label><br>
    <?php $data_color = get_post_meta($post->ID, 'custom_input_metabox_colorYourCar',true);?>
    <input id='wp_color_picker' value='<?php echo $data_color; ?>' name='colorYourCar' type='color'></input>
</p>

<p>
    <label for="wp_fuel_select">Fuel for your car</label><br>
    <?php $data_fuel = get_post_meta($post->ID, 'custom_input_metabox_fuelYourCar',true);?>
    <select id='wp_fuel_select' name='fuelYourCar'>
        <?php 
            $fuelValue = ['95','92','gas','df',];
            $fuel = ['95 fuel','92 fuel','Gas','Diesel fuel'];
            
            for($i = 0; $i < count($fuel); $i++): ?>

        <option value="<?php echo $fuel[$i];?>" <?php echo $fuel[$i] == $data_fuel ? 'selected' : ''?>>
            <?php echo $fuel[$i];?></option>

        <?php endfor;?>
    </select>
</p>

<p>
    <label for="wp_power_car">Machine power</label><br>
    <?php $data_power = get_post_meta($post->ID, 'custom_input_metabox_powerYourCar',true);?>
    <input id='wp_power_car' value='<?php echo $data_power; ?>' name='powerYourCar' type='number'></input>
</p>


<p>
    <label for="wp_price">Price</label><br>
    <?php $data_price = get_post_meta($post->ID, 'custom_input_metabox_priceYourCar',true);?>
    <input id='wp_price' value='<?php echo $data_price; ?>' name='priceYourCar' type='number'></input>
</p>
<?php 
};

//Save inputs data from custom meta-box=======================================================
add_action( 'save_post', 'wpl_save_values',10, 2);
function wpl_save_values($post_id, $post){

    $colorYourCar = isset($_POST['colorYourCar']) ? $_POST['colorYourCar'] : '';
    $fuelYourCar = isset($_POST['fuelYourCar']) ? $_POST['fuelYourCar'] : '';
    $powerYourCar = isset($_POST['powerYourCar']) ? $_POST['powerYourCar'] : '';
    $priceYourCar = isset($_POST['priceYourCar']) ? $_POST['priceYourCar'] : '';

    update_post_meta( $post_id, 'custom_input_metabox_colorYourCar', $colorYourCar );
    update_post_meta( $post_id, 'custom_input_metabox_fuelYourCar', $fuelYourCar );
    update_post_meta( $post_id, 'custom_input_metabox_powerYourCar', $powerYourCar );
    update_post_meta( $post_id, 'custom_input_metabox_priceYourCar', $priceYourCar );

}