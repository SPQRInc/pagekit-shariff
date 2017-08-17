<?php

namespace Spqr\Shariff\Controller;

use Heise\Shariff\Backend;
use Pagekit\Application as App;

/**
 * @Route("/services", name="services")
 */
class ShariffApiController
{
	/**
	 * @Route("/", methods="GET")
	 * @Request({"url":"string"})
	 *
	 * @param null $url
	 *
	 * @return array
	 */
	public function indexAction( $url = null )
	{
		$config   = App::module( 'spqr/shariff' )->config();
		$services = [];
		
		foreach ( $config[ 'services' ] as $key => $service ) {
			if ( $service ) {
				switch ( $key ) {
					case 'googleplus' :
						$services[] = "GooglePlus";
						break;
					case 'linkedin' :
						$services[] = "LinkedIn";
						break;
					case 'reddit' :
						$services[] = "Reddit";
						break;
					case 'stumbleupon	' :
						$services[] = "StumbleUpon";
						break;
					case 'flattr' :
						$services[] = "Flattr";
						break;
					case 'pinterest' :
						$services[] = "Pinterest";
						break;
					case 'xing' :
						$services[] = "Xing";
						break;
					case 'addthis' :
						$services[] = "AddThis";
						break;
					case 'facebook' :
						if ( !empty( $config[ 'facebook_api' ][ 'app_id' ] ) && !empty( $config[ 'facebook_api' ][ 'secret' ] ) ) {
							$services[] = "Facebook";
						}
						break;
				}
			}
		}
		
		$configuration = [
			'cache'    => [
				'ttl'      => $config['ttl'],
				'cacheDir' => App::get( 'path.cache' )
			],
			'domains'  => [ $_SERVER[ 'HTTP_HOST' ] ],
			'services' => $services
		];
		
		if ( !empty( $config[ 'facebook_api' ][ 'app_id' ] ) && !empty( $config[ 'facebook_api' ][ 'secret' ] ) ) {
			$configuration[ 'Facebook' ] = [
				'app_id' => $config[ 'facebook_api' ][ 'app_id' ],
				'secret' => $config[ 'facebook_api' ][ 'secret' ]
			];
		}
		
		$shariff = new Backend( $configuration );
		$counts  = $shariff->get( $url );
		
		return $counts;
	}
}