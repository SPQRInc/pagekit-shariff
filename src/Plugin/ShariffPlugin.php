<?php

namespace Spqr\Shariff\Plugin;

use Pagekit\Application as App;
use Pagekit\Content\Event\ContentEvent;
use Pagekit\Event\EventSubscriberInterface;


class ShariffPlugin implements EventSubscriberInterface
{
	
	/**
	 * Content plugins callback.
	 *
	 * @param ContentEvent $event
	 */
	public function onContentPlugins( ContentEvent $event )
	{
		
		if ( $event[ 'widget' ] ) {
			return;
		}
		
		if ((App::request()->attributes->get('_route') == '@blog' || App::request()->attributes->get('_route') == '@blog/page') && strpos(App::request()->attributes->get('_route'), '@blog/id') === false) {
			return;
		}
		
		if (App::request()->attributes->get('_route') == '@portfolio' && strpos(App::request()->attributes->get('_route'), '@portfolio/id') === false) {
			return;
		}
		
		$config = App::module( 'spqr/shariff' )->config();
		
		if ( $config['autoinsert'] && (!$config[ 'nodes' ] || in_array(
				App::request()->attributes->get( '_node' ),
				$config[ 'nodes' ]
			) ) ){
			
			$content = $event->getContent();
			
			if ( $content ) {
				
				$data = [];
				
				foreach ( $config as $key => $conf ) {
					switch ( $key ) {
						case 'orientation' :
							if ( !empty( $conf ) ) {
								$data[] = "data-orientation='$conf'";
							}
							break;
						case 'backend_url' :
							if ( $config['backend'] && !empty( $conf ) ) {
								$backend_url = App::url()->getRoute('@shariff/api/services');
								if($backend_url){
									$data[] = "data-backend-url='$backend_url'";
								}
							}
							break;
						case 'flattr_category' :
							if ( !empty( $conf ) ) {
								$data[] = "data-flattr-category='$conf'";
							}
							break;
						case 'flattr_user' :
							if ( !empty( $conf ) ) {
								$data[] = "data-flattr-user='$conf'";
							}
							break;
						case 'lang' :
							if ( !empty( $conf ) ) {
								$data[] = "data-lang='$conf'";
							}
							break;
						case 'mail_body' :
							if ( !empty( $conf ) ) {
								$data[] = "data-mail-body='$conf'";
							}
							break;
						case 'mail_subject' :
							if ( !empty( $conf ) ) {
								$data[] = "data-mail-subject='$conf'";
							}
							break;
						case 'mail_url' :
							if ( !empty( $conf ) ) {
								$data[] = "data-mail-url='$conf'";
							}
							break;
						case 'media_url' :
							if ( !empty( $conf ) ) {
								$data[] = "data-media-url='$conf'";
							}
							break;
						case 'referrer_track' :
							if ( !empty( $conf ) ) {
								$data[] = "data-referrer-track='$conf'";
							}
							break;
						case 'services' :
							if ( !empty( $conf ) ) {
								$services = [];
								foreach($conf as $k => $c){
									if($c){
										$services[] = "'$k'";
									}
								}
								
								$services = implode(",", $services);
								$services = "[$services]";
								$data[] = "data-services=$services";
							}
							break;
						case 'theme' :
							if ( !empty( $conf ) ) {
								$data[] = "data-theme='$conf'";
							}
							break;
						case 'title' :
							if ( !empty( $conf ) ) {
								$data[] = "data-title='$conf'";
							}
							break;
						case 'twitter_via' :
							if ( !empty( $conf ) ) {
								$data[] = "data-twitter-via='$conf'";
							}
							break;
						case 'url' :
							if ( !empty( $conf ) ) {
								$data[] = "data-url='$conf'";
							}
							break;
					}
				}
				
				$datastring = implode( " ", $data );
				$shariff    = "<div class='shariff' $datastring></div>";
				
				if ( $config[ 'position' ] == 'top' ) {
					$content = $shariff . $content;
				} else {
					$content = $content . $shariff;
				}
				
				$event->setContent( $content );
			}
		}
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function subscribe()
	{
		return [
			'content.plugins' => [ 'onContentPlugins', 5 ]
		];
	}
}