<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <title>НормДом</title>
        <meta name="keywords" content="НормДом" />
        <meta content="Mannatthemes" name="author" />

        <!-- favicon -->
        <link rel="shortcut icon" href="images/NormDomLogoNOTEXT1.ico" />

        <!-- css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>


<?php
/**
 * Читает CSV файл и возвращает данные в виде массива.
 *
 * @param string $file_path      Путь до csv файла.
 * @param array  $file_encodings
 * @param string $col_delimiter  Разделитель колонки (по умолчанию автоопределине)
 * @param string $row_delimiter  Разделитель строки (по умолчанию автоопределине)
 *
 * @version 6
 */
/*
function kama_parse_csv_file( $file_path, $file_encodings = ['cp1251','UTF-8'], $col_delimiter = '', $row_delimiter = '' ){

	if( ! file_exists( $file_path ) ){
		return false;
	}

	$cont = trim( file_get_contents( $file_path ) );

	$encoded_cont = iconv('UTF-8', 'UTF-8' , $cont);

	unset( $cont );

	// определим разделитель
	if( ! $row_delimiter ){
		$row_delimiter = "\r\n";
		if( false === strpos($encoded_cont, "\r\n") )
			$row_delimiter = "\n";
	}

	$lines = explode( $row_delimiter, trim($encoded_cont) );
	$lines = array_filter( $lines );
	$lines = array_map( 'trim', $lines );

	// авто-определим разделитель из двух возможных: ';' или ','.
	// для расчета берем не больше 30 строк
	if( ! $col_delimiter ){
		$lines10 = array_slice( $lines, 0, 30 );

		// если в строке нет одного из разделителей, то значит другой точно он...
		foreach( $lines10 as $line ){
			if( ! strpos( $line, ',') ) $col_delimiter = ';';
			if( ! strpos( $line, ';') ) $col_delimiter = ',';

			if( $col_delimiter ) break;
		}

		// если первый способ не дал результатов, то погружаемся в задачу и считаем кол разделителей в каждой строке.
		// где больше одинаковых количеств найденного разделителя, тот и разделитель...
		if( ! $col_delimiter ){
			$delim_counts = array( ';'=>array(), ','=>array() );
			foreach( $lines10 as $line ){
				$delim_counts[','][] = substr_count( $line, ',' );
				$delim_counts[';'][] = substr_count( $line, ';' );
			}

			$delim_counts = array_map( 'array_filter', $delim_counts ); // уберем нули

			// кол-во одинаковых значений массива - это потенциальный разделитель
			$delim_counts = array_map( 'array_count_values', $delim_counts );

			$delim_counts = array_map( 'max', $delim_counts ); // берем только макс. значения вхождений

			if( $delim_counts[';'] === $delim_counts[','] )
				return array('Не удалось определить разделитель колонок.');

			$col_delimiter = array_search( max($delim_counts), $delim_counts );
		}

	}

	$data = [];
	foreach( $lines as $key => $line ){
		$data[] = str_getcsv( $line, $col_delimiter ); // linedata
		unset( $lines[$key] );
	}

	return $data;
}


$data = kama_parse_csv_file( 'test.csv' );
print_r( $data ); */


/*
$fh = fopen('test.csv', "r");
fgetcsv($fh, 0, ',');

// массив, в который данные будут сохраняться
$data = [];
while (($row = fgetcsv($fh, 0, ',')) !== false) {
    list($id, $region_id, $area_id, $city_id, $shortname_region, $formalname_region, $shortname_area, $formalname_area, $shortname_city, $formalname_city, $shortname_street, $formalname_street, $house_number, $building, $block, $letter, $address, $houseguid, $management_organization_id, $built_year, $exploitation_start_year, $project_type, $house_type, $is_alarm, $method_of_forming_overhaul_fund, $floor_count_max, $floor_count_min, $entrance_count, $elevators_count, $energy_efficiency, $quarters_count, $living_quarters_count, $unliving_quarters_count, $area_total, $area_residential, $area_non_residential, $area_common_property, $area_land, $parking_square, $playground, $sportsground, $other_beautification, $foundation_type, $floor_type, $wall_material, $basement_area, $chute_type, $chute_count, $electrical_type, $electrical_entries_count, $heating_type, $hot_water_type, $cold_water_type, $sewerage_type, $sewerage_cesspools_volume, $gas_type, $ventilation_type, $firefighting_type, $drainage_type) = $row;

    $data[] = [
        'id' => $id,
        'region_id' => $region_id,
        'area_id' => $area_id,
        'city_id' => $city_id,
        'shortname_region' => $shortname_region,
        'formalname_region' => $formalname_region,
        'shortname_area' => $shortname_area,
        'formalname_area' => $formalname_area,
        'shortname_city' => $shortname_city,
        'formalname_city' => $formalname_city,
        'shortname_street' => $shortname_street,
        'formalname_street' => $formalname_street,
        'house_number' => $house_number,
        'building' => $building,
        'block' => $block,
        'letter' => $letter,
        'address' => $address,
        'houseguid' => $houseguid,
        'management_organization_id' => $management_organization_id,
        'built_year' => $built_year,
        'exploitation_start_year' => $exploitation_start_year,
        'project_type' => $project_type,
        'house_type' => $house_type,
        'is_alarm' => $is_alarm,
        'method_of_forming_overhaul_fund' => $method_of_forming_overhaul_fund,
        'floor_count_max' => $floor_count_max,
        'floor_count_min' => $floor_count_min,
        'entrance_count' => $entrance_count,
        'elevators_count' => $elevators_count,
        'energy_efficiency' => $energy_efficiency,
        'quarters_count' => $quarters_count,
        'living_quarters_count' => $living_quarters_count,
        'unliving_quarters_count' => $unliving_quarters_count,
        'area_total' => $area_total,
        'area_residential' => $area_residential,
        'area_non_residential' => $area_non_residential,
        'area_common_property' => $area_common_property,
        'area_land' => $area_land,
        'parking_square' => $parking_square,
        'playground' => $playground,
        'sportsground' => $sportsground,
        'other_beautification' => $other_beautification,
        'foundation_type' => $foundation_type
        'floor_type' => $floor_type,
        'wall_material' => $wall_material,
        'basement_area' => $basement_area,
        'chute_type' => $chute_type,
        'chute_count' => $chute_count,
        'electrical_type' => $electrical_type,
        'electrical_entries_count' => $electrical_entries_count,
        'heating_type' => $heating_type,
        'hot_water_type' => $hot_water_type,
        'cold_water_type' => $cold_water_type,
        'sewerage_type' => $sewerage_type,
        'sewerage_cesspools_volume' => $sewerage_cesspools_volume,
        'gas_type' => $gas_type,
        'ventilation_type' => $ventilation_type,
        'firefighting_type' => $firefighting_type,
        'drainage_type' => $drainage_type
    ];
}

// теперь в массиве $data расположены все элементы из CSV-файла
foreach ($data as $row) {
    echo 'ID:' . $row['id'];
    echo 'region_id:' . $row['region_id'];
    echo 'area_id:' . $row['area_id'];
    echo 'city_id:' . $row['city_id'];
    echo 'shortname_region:' . $row['shortname_region'];
    echo 'formalname_region:' . $row['formalname_region'];
    echo 'shortname_area:' . $row['shortname_area'];
    echo 'formalname_area:' . $row['formalname_area'];
    echo 'shortname_city:' . $row['shortname_city'];
    echo 'formalname_city:' . $row['formalname_city'];
    echo 'shortname_street:' . $row['shortname_street'];
    echo 'formalname_street:' . $row['formalname_street'];
    echo 'house_number:' . $row['house_number'];
    echo 'building:' . $row['building'];
    echo 'block:' . $row['block'];
    echo 'letter:' . $row['letter'];
    echo 'address:' . $row['address'];
    echo 'houseguid:' . $row['houseguid'];
    echo 'management_organization_id:' . $row['management_organization_id'];
    echo 'built_year:' . $row['built_year'];
    echo 'exploitation_start_year:' . $row['exploitation_start_year'];
    echo 'project_type:' . $row['project_type'];
    echo 'house_type:' . $row['house_type'];
    echo 'is_alarm:' . $row['is_alarm'];
    echo 'method_of_forming_overhaul_fund:' . $row['method_of_forming_overhaul_fund'];
    echo 'floor_count_max:' . $row['floor_count_max'];
    echo 'floor_count_min:' . $row['floor_count_min'];
    echo 'entrance_count:' . $row['entrance_count'];
    echo 'elevators_count:' . $row['elevators_count'];
    echo 'energy_efficiency:' . $row['energy_efficiency'];
    echo 'quarters_count:' . $row['quarters_count'];
    echo 'living_quarters_count:' . $row['living_quarters_count'];
    echo 'unliving_quarters_count:' . $row['unliving_quarters_count'];
    echo 'area_total:' . $row['area_total'];
    echo 'area_residential:' . $row['area_residential'];
    echo 'area_non_residential:' . $row['area_non_residential'];
    echo 'area_common_property:' . $row['area_common_property'];
    echo 'area_land:' . $row['area_land'];
    echo 'parking_square:' . $row['parking_square'];
    echo 'playground:' . $row['playground'];
    echo 'sportsground:' . $row['sportsground'];
    echo 'other_beautification:' . $row['other_beautification'];
    echo 'foundation_type:' . $row['foundation_type'];
    echo 'floor_type:' . $row['floor_type'];
    echo 'wall_material:' . $row['wall_material'];
    echo 'basement_area:' . $row['basement_area'];
    echo 'chute_type:' . $row['chute_type'];
    echo 'chute_count:' . $row['chute_count'];
    echo 'electrical_type:' . $row['electrical_type'];
    echo 'electrical_entries_count:' . $row['electrical_entries_count'];
    echo 'heating_type:' . $row['heating_type'];
    echo 'hot_water_type:' . $row['hot_water_type'];
    echo 'cold_water_type:' . $row['cold_water_type'];
    echo 'sewerage_type:' . $row['sewerage_type'];
    echo 'sewerage_cesspools_volume:' . $row['sewerage_cesspools_volume'];
    echo 'gas_type:' . $row['gas_type'];
    echo 'ventilation_type:' . $row['ventilation_type'];
    echo 'firefighting_type:' . $row['firefighting_type'];
    echo 'drainage_type:' . $row['drainage_type'];
    //...
}
*/

/*
echo "<html><body><center><table>\n\n";
  
        // Open a file
        $file = fopen("test.csv", "r");
  
        // Fetching data from csv file row by row
        while (($data = fgetcsv($file, 0, ";")) !== false) {
  
            // HTML tag for placing in row format
            echo "<tr>";
            foreach ($data as $i) {
                echo "<td>" . $i 
                    . "</td>";
            }
            echo "</tr> \n";
        }
  
        // Closing the file
        fclose($file);
  
        echo "\n</table></center></body></html>";

*/

/*
CREATE TABLE house.house (id_all INT NOT NULL AUTO_INCREMENT , id INT NOT NULL,  region_id VARCHAR(100) NOT NULL , area_id VARCHAR(100) NULL , city_id VARCHAR(100) NULL ,street_id VARCHAR(100) NULL , shortname_region VARCHAR(20) NOT NULL , formalname_region VARCHAR(20) NOT NULL , shortname_area VARCHAR(20) NULL , formalname_area VARCHAR(20) NULL , shortname_city VARCHAR(20) NULL , formalname_city VARCHAR(50) NULL , shortname_street VARCHAR(20) NULL , formalname_street VARCHAR(100) NULL , house_number VARCHAR(50) NULL , building VARCHAR(50) NULL , block VARCHAR(50) NULL , letter VARCHAR(30) NULL , address VARCHAR(100) NOT NULL , houseguid VARCHAR(100) NOT NULL , management_organization_id INT NULL , built_year INT NULL , exploitation_start_year INT NULL , project_type VARCHAR(100) NULL , house_type VARCHAR(50) NOT NULL , is_alarm VARCHAR(10) NOT NULL , method_of_forming_overhaul_fund VARCHAR(50) NOT NULL , floor_count_max INT NULL , floor_count_min INT NULL , entrance_count INT NULL , elevators_count INT NULL , energy_efficiency VARCHAR(30) NOT NULL , quarters_count INT NOT NULL , living_quarters_count INT NULL , unliving_quarters_count INT NULL , area_total INT NULL , area_residential INT NULL , area_non_residential INT NULL , area_common_property INT NULL , area_land INT NULL , parking_square INT NULL , playground INT NOT NULL , sportsground INT NOT NULL , other_beautification VARCHAR(300) NULL , foundation_type VARCHAR(30) NOT NULL, floor_type VARCHAR(30) NOT NULL , wall_material VARCHAR(30) NOT NULL , basement_area INT NULL , chute_type VARCHAR(30) NOT NULL , chute_count INT NULL , electrical_type VARCHAR(30) NOT NULL , electrical_entries_count INT NULL , heating_type VARCHAR(50) NOT NULL , hot_water_type VARCHAR(100) NOT NULL , cold_water_type VARCHAR(50) NOT NULL , sewerage_type VARCHAR(30) NOT NULL , sewerage_cesspools_volume INT NULL , gas_type VARCHAR(20) NOT NULL , ventilation_type VARCHAR(50) NOT NULL , firefighting_type VARCHAR(30) NOT NULL , drainage_type VARCHAR(30) NOT NULL ,   PRIMARY KEY (id_all)) ENGINE = InnoDB;
*/

/*
include "db.php";

$file = fopen("test.csv", "r");

$request = "INSERT INTO house (id_all, id, region_id, area_id, city_id, street_id, shortname_region, formalname_region, 
shortname_area, formalname_area, shortname_city, formalname_city, shortname_street, formalname_street, house_number, building, 
blockck, letter, addresss, houseguid, management_organization_id, built_year, exploitation_start_year, project_type, house_type, is_alarm, 
method_of_forming_overhaul_fund, floor_count_max, floor_count_min, entrance_count, elevators_count, energy_efficiency, quarters_count, 
living_quarters_count, unliving_quarters_count, area_total, area_residential, area_non_residential, area_common_property, area_land, parking_square, 
playground, sportsground, other_beautification, foundation_type, floor_type, wall_material, basement_area, chute_type, chute_count, electrical_type, 
electrical_entries_count, heating_type, hot_water_type, cold_water_type, sewerage_type, sewerage_cesspools_volume, gas_type, ventilation_type, firefighting_type, drainage_type) VALUES (NULL ";

while (($data = fgetcsv($file, 0, ";")) !== false) {
  
    // HTML tag for placing in row format
    foreach ($data as $i) {
        if ($i == null){
            $request .= ", NULL";
        }else{
            $request .= ", '$i'";
        }
    }
    $request .= ")";
    $result = mysqli_query($mysql, $request);
    $request = "INSERT INTO house (id_all, id, region_id, area_id, city_id, street_id, shortname_region, formalname_region, 
    shortname_area, formalname_area, shortname_city, formalname_city, shortname_street, formalname_street, house_number, building, 
    blockck, letter, addresss, houseguid, management_organization_id, built_year, exploitation_start_year, project_type, house_type, is_alarm, 
    method_of_forming_overhaul_fund, floor_count_max, floor_count_min, entrance_count, elevators_count, energy_efficiency, quarters_count, 
    living_quarters_count, unliving_quarters_count, area_total, area_residential, area_non_residential, area_common_property, area_land, parking_square, 
    playground, sportsground, other_beautification, foundation_type, floor_type, wall_material, basement_area, chute_type, chute_count, electrical_type, 
    electrical_entries_count, heating_type, hot_water_type, cold_water_type, sewerage_type, sewerage_cesspools_volume, gas_type, ventilation_type, firefighting_type, drainage_type) VALUES (NULL ";

}

// Closing the file
fclose($file);
*/


include "db.php";
?>

    <body>
        <!-- start navbar -->
        <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
            <div class="container">
                <a href="index.html">
                    <img src="images/NormDomTextFooter.png" alt="" height="50" />
                </a><!--end navbar-brand-->

                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto navbar-center mt-lg-0 mt-2">
                        <li class="nav-item">
                            <a class="nav-link-a active" href="index.php">Главная</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="main_black.php">Темная тема</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="search.php">Поиск</a>
                        </li><!--end nav-item-->                        
                        <li class="nav-item">
                            <a class="nav-link-a" href="resume.html">Резюме</a>
                        </li><!--end nav-item-->
                        <li class="nav-item">
                            <a class="nav-link-a" href="contact.php">Контакт</a>
                        </li><!--end nav-item-->
                    </ul><!--end navbar-nav-->
                    <button type="button" class="btn btn-primary btn-hover"><a class="btn-a" href="signUp.php">Регистрация<a></button>
                    <button type="button" class="btn btn-green"><a class="btn-a" href="signIn.php">Вход<a></button>
                    <!--<a href="singUp.php" class="btn btn-sm nav-btn text-primary mb-4 mb-lg-0">Регистрация<i class="icon-xxs ms-1" data-feather="chevrons-right"></i></a>-->
                </div><!-- end #navbarNav -->
            </div><!-- end container -->
        </nav>
        <!-- end navbar -->

        <!-- start hero -->
        <section class="hero-one position-relative main-bg" id="home"  style="background-image: url(images/personal/main-bg.png); background-size: cover; background-position: center center;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    
                    <div class="col-lg-5  mx-auto mt-5"> 
                        <img src="images/personal/1.png" alt="" class="img-fluid ml-lg-5">
                    </div><!--end col--> 
                    <div class="col-lg-7 text-center px-0 px-xl-4 mt-5 mt-lg-0 pt-5 pt-lg-0">
                        <h5 class="d-inline-block py-1 px-3 rounded text-muted font-secondary">Привет, Я Глеб Назаренко</h5>
                        <h1 class="hero-title mb-4 font-secondary fo">Я фриланс <mark><span class="fw-medium typewrite" data-period="2000" data-type='["Java-", "PHP-", "Python-"]'></span></mark>разработчик</h1>   
                        <span class="wrap"></span>                     
                        <div class="mb-5 mb-lg-0">                           
                            <div class="d-inline-block">
                                <a href="resume.html" class="btn btn-primary">Резюме</a>
                            </div>
                        </div>
                    </div><!--end col-->                  
                </div><!--end row-->             
            </div><!-- end container -->
        </section>
        <!-- end hero -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- start about -->
        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>
        <!-- end about -->

        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>

        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>

        <section class="section" id="about">
            <div class="container">
                <div class="row align-items-center">                
                    <div class="col-lg-6 ms-auto align-self-center">
                        <h5 class="fs-24 text-dark fw-medium mb-3"><mark>Персональные данные</mark></h5>       
                        <h4 class="fw-normal lh-base text-gray-700 mb-5 fs-20">Давно установленный факт, что читатель будет отвлекаться на читаемое содержимое страницы и возьмет меня на работу.
                        </h4>
                        <div class="social mt-5">
                            <a href="https://github.com/glebanazarenko">
                                <i class="lab la-github github me-1"></i>
                            </a>
                            <a href="https://vk.com/hlebik_official">
                                <i class="lab la-vk vk me-1"></i>
                            </a>
                            <a href="https://t.me/hlebik">
                                <i class="lab la-telegram telegram me-1"></i>
                            </a>
                        </div>
                    </div><!--end col-->

                    
                    <div class="col-lg-5 ms-auto align-self-center">
                        <div class="mb-5 mb-lg-0">
                            <p class="mb-2">
                                <span class="personal-detail-title">Дата рождения</span> 
                                <span class="personal-detail-info">26 июля 2003</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Владение языками</span> 
                                <span class="personal-detail-info">Русский - Английский - Программный</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Национальность</span> 
                                <span class="personal-detail-info">Русский</span>
                            </p>
                            <p class="mb-2">
                                <span class="personal-detail-title">Интересы</span> 
                                <span class="personal-detail-info">Чтение, Спорт, Сон</span>
                            </p>
                        </div>
                    </div><!--end col-->
                    </div><!--end row--> 
            </div><!-- end container -->
        </section>

        <?php
        include "footer.php";
        ?>
        
    </body>
</html>