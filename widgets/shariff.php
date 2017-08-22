<?php

use Pagekit\Application as App;

return [
	'name'   => 'spqr/shariff',
	'label'  => 'Shariff Widget',
	'events' => [
		'view.scripts' => function( $event, $scripts ) use ( $app ) {
			$scripts->register(
				'shariff-widget',
				'spqr/shariff:app/bundle/shariff-widget.js',
				[ '~widgets' ]
			);
		}
	],
	
	'render' => function( $widget ) use ( $app ) {
		
		$config = App::module( 'spqr/shariff' )->config();
		$data   = [];
		
		foreach ( $config as $key => $conf ) {
			switch ( $key ) {
				case 'orientation' :
					if ( $widget->get( 'overwrite_orientation' ) && !empty( $widget->get( 'orientation' ) ) ) {
						$data[] = "data-orientation='" . $widget->get( 'orientation' ) . "'";
					} elseif ( !empty( $conf ) ) {
						$data[] = "data-orientation='$conf'";
					}
					break;
				case 'backend_url' :
					if ( $config[ 'backend' ] && !empty( $conf ) ) {
						$backend_url = App::url()->getRoute( '@shariff/api/services' );
						if ( $backend_url ) {
							$data[] = "data-backend-url='$backend_url'";
						}
					}
					break;
				case 'flattr_category' :
					if ( $widget->get( 'overwrite_services' ) && !empty( $widget->get( 'flattr_category' ) ) ) {
						$data[] = "data-flattr-category='" . $widget->get( 'flattr_category' ) . "'";
					} elseif ( !empty( $conf ) ) {
						$data[] = "data-flattr-category='$conf'";
					}
					break;
				case 'flattr_user' :
					if ( $widget->get( 'overwrite_services' ) && !empty( $widget->get( 'flattr_user' ) ) ) {
						$data[] = "data-flattr-user='" . $widget->get( 'flattr_user' ) . "'";
					} elseif ( !empty( $conf ) ) {
						$data[] = "data-flattr-user='$conf'";
					}
					break;
				case 'lang' :
					if ( $widget->get( 'overwrite_lang' ) && !empty( $widget->get( 'lang' ) ) ) {
						$data[] = "data-lang='" . $widget->get( 'lang' ) . "'";
					} elseif ( !empty( $conf ) ) {
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
					if ( $widget->get( 'overwrite_services' ) && !empty( $widget->get( 'services' ) ) ) {
						$services = [];
						foreach ( $widget->get( 'services' ) as $k => $c ) {
							if ( $c ) {
								$services[] = "'$k'";
							}
						}
						
						$services = implode( ",", $services );
						$services = "[$services]";
						$data[]   = "data-services=$services";
						
					} elseif ( !empty( $conf ) ) {
						$services = [];
						foreach ( $conf as $k => $c ) {
							if ( $c ) {
								$services[] = "'$k'";
							}
						}
						
						$services = implode( ",", $services );
						$services = "[$services]";
						$data[]   = "data-services=$services";
					}
					break;
				case 'theme' :
					if ( $widget->get( 'overwrite_theme' ) && !empty( $widget->get( 'theme' ) ) ) {
						$data[] = "data-theme='" . $widget->get( 'theme' ) . "'";
					} elseif ( !empty( $conf ) ) {
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
		
		$app[ 'styles' ]->add(
			'spqr/shariff',
			'spqr/shariff:app/assets/shariff/build/shariff.complete.css'
		);
		$app[ 'scripts' ]->add(
			'spqr/shariff',
			'spqr/shariff:app/assets/shariff/build/shariff.complete.js',
			[ 'jquery' ],
			[ 'defer' => true ]
		);
		
		return $app->view( 'spqr/shariff/widget/shariff.php', compact( 'datastring' ) );
	}
];