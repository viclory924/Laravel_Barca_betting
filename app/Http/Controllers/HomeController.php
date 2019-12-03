<?php
namespace App\Http\Controllers;
use App\StaygamingBO;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent as Agent;
use Illuminate\Support\Facades\Auth;
use App\Player;
use Illuminate\Support\Facades\Hash;
use Config;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $countries = StaygamingBO::getCountries();
        $currencies = StaygamingBO::getCurrencies();
        
			if (isset($_COOKIE['locale']) && $_COOKIE['locale'] != '') {
				return view('index.home', compact('countries', 'currencies'));
			}
			else
			{
				$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
				//echo $lang;
				$acceptLang = ['en','ru','zh','es','po','vi']; 
				$lang = in_array($lang, $acceptLang) ? $lang : 'en';
				//echo 'https://bettend.com/lang/'.$lang;
				
				//$lang = 'en';
				return redirect('https://bettend.com/lang/'.$lang);
			}
		
    }

    public function selectLanguage(Request $request)
    {
        if (isset($_COOKIE['locale']) && $_COOKIE['locale'] != '') {
            return $this->index($request);
        } else {
           // $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
			$lang = 'en';	
            if (!array_key_exists($lang, Config::get('languages'))) {
                $lang = 'en';
            }

            Session::put('applocale', $lang);
            setcookie('locale', $lang, '0', '/');
            \App::setLocale(Session::get('applocale'));

            return $this->index($request);
        }
        //return view('index.select-language');
    }

    public function contacts()
    {
        return view('');
    }

    public function about()
    {
        return view('index.about');
    }

    public function casino()
    {
        $Agent = new Agent();
        if ($Agent->isMobile() || $Agent->isTablet() || $Agent->isPhone()) {
            $device = 'mobile';
//            foreach ($casino_games as $key => $game) {
//                if ($game->mobile != 1) {
//                    unset($casino_games[$key]);
//                }
//            }
        } else {
            $device = 'desktop';
//            foreach ($casino_games as $key => $game) {
//                if ($game->mobile == 1) {
//                    unset($casino_games[$key]);
//                }
//            }
        }
        $data = [
            'active_menu' => 'casino',
            'show_filter' => true,
            'games' => [],
//            'games' => $sort_casino,
//            'tags' => $tags,
            'tags' => [],
            'providers' => \App\StaygamingBO::getGamesVendors('casino'),
            'GAME_provider' => '',
            'search_params' => [],
            'favorite_games' => '',
            'top_wins' => isset($get_top_wins->result) ? $get_top_wins->result : '',
            'device' => $device,
            'offset_action' => '',
			'casino_type' => 'casino'
		];
			
			
			
			if (isset($_COOKIE['locale']) && $_COOKIE['locale'] != '') 
			{
					return view('index.casino', $data);
			}
			else
			{
				$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
				$acceptLang = ['en','ru','zh','es','po','vi']; 
				$lang = in_array($lang, $acceptLang) ? $lang : 'en';
				//$lang = 'en';
				return redirect('https://bettend.com/lang/'.$lang);
			}
				
    }

    public function bingo()
    {
        $Agent = new Agent();
        if ($Agent->isMobile() || $Agent->isTablet() || $Agent->isPhone()) {
            $device = 'mobile';
        } else {
            $device = 'desktop';
        }
        return view('bingo', ['device' => $device, 'active_menu' => 'bingo', 'show_filter' => false, 'games' => false]);
        //return view('player.activation-email-sent', ['title' => 'Under Construction', 'text' => 'Coming soon']);
    }

    public function casinoLive()
    {
        $Agent = new Agent();
        if ($Agent->isMobile() || $Agent->isTablet() || $Agent->isPhone()) {
            $device = 'mobile';
//            foreach ($casino_games as $key => $game) {
//                if ($game->mobile != 1) {
//                    unset($casino_games[$key]);
//                }
//            }
        } else {
            $device = 'desktop';
//            foreach ($casino_games as $key => $game) {
//                if ($game->mobile == 1) {
//                    unset($casino_games[$key]);
//                }
//            }
        }
        $data = [
            'active_menu' => 'casino-live',
            'show_filter' => true,
            'games' => [],
//            'games' => $sort_casino,
//            'tags' => $tags,
            'tags' => [],
            'providers' => \App\StaygamingBO::getGamesVendors('casino-live'),
            'GAME_provider' => '',
            'search_params' => [],
            'favorite_games' => '',
            'top_wins' => isset($get_top_wins->result) ? $get_top_wins->result : '',
            'device' => $device,
            'offset_action' => '',
			'casino_type' => 'casino-live'
			
        ];
	
       return view('index.casino', $data);
	  //  return view('index.casino-live', ['casino_type' => 'casino-live']);
    }

	public function sport(){
		$countries = StaygamingBO::getCountries();
		$bonuses = array();
	    $currencies = StaygamingBO::getCurrencies();
		if(\Auth::user() != null && isset( \Auth::user()->player_id )){
			$player_token = \Auth::user()->access_token;
		} else {
			$player_token = '';
		}
		return view('sports', [
		    'countries' => $countries,
            'currencies' => $currencies,
            'bonuses' => $bonuses,
            'player_token' => $player_token,
            'casino_type' => 'sport',
			'active_menu' => 'sport',
			'show_filter' => false
			]
        );
	}

	public function games(Request $request)
	{
		$res = StaygamingBO::games($request);

		return $res;
	}

	public function viewGames($games_type)
	{

		return view('games.view-games', ['type' => $games_type]);
	}

	public function getPlayerCards($pid,$ctype='test',Request $request){
		$ptype = $request->get('type');
		$boUrl = env('BO_URL');
		if($ptype) {
			$url = $boUrl.'player-cards/'.$pid.'/'.$ctype.'?type=refund';
		}else{
			$url=$boUrl.'player-cards/'.$pid.'/'.$ctype;
		}
		return file_get_contents($url);
	}

	public function makePayment(Request $request){
		$boUrl=env('BO_URL');
		$url=$boUrl.'lpspayment';
		return $this->curlPost($url,$request->all());
	}

	private function curlPost($url,$data){
		$curl     = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
		$response = curl_exec($curl);
		if (curl_error($curl)) {
			$json['error'] = 'CURL ERROR: ' . curl_errno($curl) . '::' . curl_error($curl);

			echo 'AUTHNET AIM CURL ERROR: ' . curl_errno($curl) . '::' . curl_error($curl);
		} elseif ($response) {
			return $response;
		}
		curl_close($curl);
	}

	public function contactUs(Request $request)
	{
		$data = array();
		$data['name'] = $request->name;
		$data['email'] = $request->email;
		$data['message'] = $request->message;

		// mail to support
		\Mail::send('emails.contact-us-support', ['data' => $data], function ($m) use ($data) {
			$m->from($data['email'], $data['name']);
			$m->to(env('SUPPORT_EMAIL'), 'SUPPORT')->subject('Contact Form Data');

		});

		// mail to user
		\Mail::send('emails.contact-us-user', ['data' => $data], function ($m) use ($data) {
			$m->from(env('SUPPORT_EMAIL'), 'SUPPORT');
			$m->to($data['email'], $data['name'])->subject('Contact Form');

		});


		$alert = [
			'type' => 'alert-success',
			'message' => 'Your message has been sent!'
		];
		return redirect()->to('/' . '?' . http_build_query($alert));
	}

	public function promotions()
    {
        return view('home.promotions');
    }

    public function getIframeUrl(Request $request)
    {
        $game_id = $request->game_id;

        $url = \App\StaygamingBO::getGameIframeUrl($game_id, $params = $request->toArray());

        return $url;
    }

    public function getGamesByIds(Request $request) {
        $res = StaygamingBO::getGamesByIds($request);

        return $res;
    }

    public function liveSport() {
        $countries = StaygamingBO::getCountries();
        $bonuses = array();
        $currencies = StaygamingBO::getCurrencies();
        if(\Auth::user() != null && isset( \Auth::user()->player_id )){
            $player_token = \Auth::user()->access_token;
        } else {
            $player_token = '';
        }
        return view('live-sports', [
                'countries' => $countries,
                'currencies' => $currencies,
                'bonuses' => $bonuses,
                'player_token' => $player_token,
                'casino_type' => 'sport']
        );
    }

    public function createSupportTicket(Request $request) {
        $res = \App\StaygamingBO::createSupportTicket($request);

        return $res;
    }

    public function bonus() {
        $Agent = new Agent();
        if ($Agent->isMobile() || $Agent->isTablet() || $Agent->isPhone()) {
            $device = 'mobile';
        } else {
            $device = 'desktop';
        }
		 $data = [
            'active_menu' => 'bonus',
            'show_filter' => true,
            'games' => [],
//            'games' => $sort_casino,
//            'tags' => $tags,
            'tags' => [],
            'providers' => \App\StaygamingBO::getGamesVendors('casino'),
            'GAME_provider' => '',
            'search_params' => [],
            'favorite_games' => '',
            'top_wins' => isset($get_top_wins->result) ? $get_top_wins->result : '',
            'device' => $device,
            'offset_action' => '',
			'casino_type' => 'casino'
		];
		
			if (isset($_COOKIE['locale']) && $_COOKIE['locale'] != '') {
				return view('bonus', $data);
			}
			else
			{
				$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
				$acceptLang = ['en','ru','zh','es','po','vi']; 
				$lang = in_array($lang, $acceptLang) ? $lang : 'en';
				return redirect('https://bettend.com/lang/'.$lang);
			}
       
    }

    public function poker() {
        $games = [];
        $data = [
            'active_menu' => 'poker',
            'show_filter' => false,
            'games' => $games,
        ];
        return view('poker', $data);
    }

    public function info() {
        $data = [
            'active_menu' => 'info',
            'show_filter' => false,
        ];
        return view('info', $data);
    }
}
