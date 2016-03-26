<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showLogin()
	{
		return View::make('posts.login');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showSimon()
	{
		return View::make('simon');
	}

	public function showButtonMash()
	{
		return View::make('buttonmash');
	}

	public function doLogin()
	{
		$email		= Input::get('email');
		$password	= Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
		    return Redirect::intended('/');
		} else {
			Session::flash('errorMessage', 'Login failed.');
			Log::error('Failed login');
		    return Redirect::action('HomeController@showLogin');
		}
	}

	public function doLogout()
	{
		Auth::logout();
		Session::flash('','Logout successful');
		return Redirect::to('/');
	}

	public function about()
	{
		return View::make('about');
	}
	
	public function ebay()
	{
		$categories = array(
			'625' => 'Camera & Photo',
			'11724' => 'Camcorders',
			'28179' => 'Binoculars & Telescopes',
			'179697' => 'Camera Drones',
			'15200' => 'Camera & Photo Accessories',
			'69323' => 'Film Photography',
			'15230' => 'Film Cameras',
			'64353' => 'Flashes & Flash Accessories',
			'78997' => 'Lenses & Filters',
			'30078' => 'Lighting & Studio',
			'162047' => 'Replacement Parts & Tools',
			'30090' => 'Tripods & Supports',
			'21162' => 'Video Production & Editing',
			'31388' => 'Digital Cameras'
		);
		return View::make('ebay')->with('categories', $categories);
	}
	
	public function ebaySearch()
	{
		Input::flash();
		$categories = array(
			'625' => 'Camera & Photo',
			'11724' => 'Camcorders',
			'28179' => 'Binoculars & Telescopes',
			'179697' => 'Camera Drones',
			'15200' => 'Camera & Photo Accessories',
			'69323' => 'Film Photography',
			'15230' => 'Film Cameras',
			'64353' => 'Flashes & Flash Accessories',
			'78997' => 'Lenses & Filters',
			'30078' => 'Lighting & Studio',
			'162047' => 'Replacement Parts & Tools',
			'30090' => 'Tripods & Supports',
			'21162' => 'Video Production & Editing',
			'31388' => 'Digital Cameras'
		);
		$priceArray = array();
		
		error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

		// API request variables
		$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
		$version = '1.7.0';  // API version supported by your application
		$appid = 'JoshWoma-noisefig-PRD-938949440-bceadfd7';  // Replace with your own AppID
		$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
		$query = Input::get('itemName');  // You may want to supply your own query
		$safequery = urlencode($query);  // Make the query URL-friendly
		$category = Input::get('category');
		$filterarray = array(
			array(
				'name' => 'SoldItemsOnly',
				'value' => true
			)
		);
		$urlfilter = $this->buildURLArray($filterarray);

		// Construct the findItemsByKeywords HTTP GET call
		$apicall = "$endpoint?";
		$apicall .= "OPERATION-NAME=findCompletedItems";
		$apicall .= "&SERVICE-VERSION=$version";
		$apicall .= "&SECURITY-APPNAME=$appid";
		$apicall .= "&GLOBAL-ID=$globalid";
		$apicall .= "&keywords=$safequery";
		$apicall .= "&categoryId=$category";
		$apicall .= "&paginationInput.entriesPerPage=50";
		$apicall .= "$urlfilter";
		
		// Load the call and capture the document returned by eBay API
		$resp = simplexml_load_file($apicall);

		// Check to see if the request was successful, else print an error
		if ($resp->ack == "Success") {
			$results = '';
			// If the response was loaded, parse it and build links
			foreach($resp->searchResult->item as $item) {
				// print_r($item);
				$pic   = $item->galleryURL;
				$link  = $item->viewItemURL;
				$title = $item->title;
				$price = $item->sellingStatus->convertedCurrentPrice;
				$priceArray[] = floatval($price->__toString());
				$displayPrice = number_format($price->__toString() , 2, '.', ',');
				// For each SearchResultItem node, build a link and append it to $results
				$results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td><td>\$$displayPrice</td></tr>";
			}
			if (count($priceArray) != 0) {
				$average = number_format(array_sum($priceArray) / count($priceArray) , 2, '.', ',');

				$each = [];
				foreach($priceArray as $price) {
					$each[] = pow($price - $average, 2);
				}

				$v_sum = array_sum($each);

				$variance = $v_sum / count($priceArray);

				$st_dev = sqrt($variance);
				
				$newPrices = array();
				foreach ($priceArray as $price) {

					$multiple = 1.5 * $st_dev;
					
					$lessThan = $average - $multiple;
					$greaterThan = $average + $multiple;

					if ($price < $lessThan) {
						$price  = $price + $multiple;
					}

					if ($price > $greaterThan) {
						$price  = $price - $multiple;
					}
					$newPrices[] = $price;
				}

				$newAverage = number_format(array_sum($newPrices) / count($newPrices) , 2, '.','');
			} else {
				$newAverage = 'No Results Found.';
			}

		}
		// If the response does not indicate 'Success,' print an error
		else {
			$results  = "<h3>Oops!</h3>";
			$newAverage = "No Results Found.";
		}

		$data = array(
			'categories' => $categories, 
			'results' => $results,
			'query' => $query,
			'average' => $newAverage
		);
		return View::make('ebay')->with($data);
	}
	
	public function buildURLArray($filterarray) {
		global $urlfilter;
		$i = 0;
		// Iterate through each filter in the array
		foreach($filterarray as $itemfilter) {
			// Iterate through each key in the filter
			foreach ($itemfilter as $key =>$value) {
				if(is_array($value)) {
					foreach($value as $j => $content) { // Index the key for each value
						$urlfilter .= "&itemFilter($i).$key($j)=$content";
					}
				} elseif($value != "") {
					$urlfilter .= "&itemFilter($i).$key=$value";
				}
			}
			$i++;
		}
		return "$urlfilter";
	} // End of buildURLArray function
}
