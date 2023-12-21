<?php

class EUBA_Styles {
	

	public function spacingsMobile($block, $spacings){
		$bigSpacings = ['news.php', 'cards.php', 'slider-cpt.php', 'slider-cpt.php', 'person-list.php', 'choices.php', 'find.php'];
		$templates = $block['render_template'];
		$id = $block['id'];

		if($spacings){
			echo '<style>';
				echo '@media(max-width:767px){';
					echo '#' . $id . '{ padding: 30px 0; }';
				echo '}';
			echo '</style>';
			foreach ($bigSpacings as $value) {
				if($value === $templates){
					echo '<style>';
						echo '@media(max-width:767px){';
							echo '#' . $id . '{ padding: 60px 0; }';
						echo '}';
					echo '</style>';
				}
			}
		}	
	}

	public function spacingsTablet($block, $spacings){
		$bigSpacings = ['news.php', 'cards.php', 'slider-cpt.php', 'slider-cpt.php', 'person-list.php', 'choices.php', 'find.php'];
		$templates = $block['render_template'];
		$id = $block['id'];

		if($spacings){
			echo '<style>';
				echo '@media(max-width:1700px){';
					echo '#' . $id . '{ padding: 45px 0; }';
				echo '}';
			echo '</style>';
			foreach ($bigSpacings as $value) {
				if($value === $templates){
					echo '<style>';
						echo '@media(max-width:1700px){';
							echo '#' . $id . '{ padding: 90px 0; }';
						echo '}';
					echo '</style>';
				}
			}
		}
	}

	public function spacingsDesktop($block, $spacings){
		$bigSpacings = ['news.php', 'cards.php', 'slider-cpt.php', 'slider-cpt.php', 'person-list.php', 'choices.php', 'find.php'];
		$templates = $block['render_template'];
		$id = $block['id'];
		
		if($spacings){
			echo '<style>';
				echo '#' . $id . '{ padding: 85px 0; }';
			echo '</style>';
			foreach ($bigSpacings as $value) {
				if($value === $templates){
					echo '<style>';
						echo '#' . $id . '{ padding: 165px 0; }';
					echo '</style>';
				}
			}
		}
	}

}

new EUBA_Styles();



class container_Styles {

	public function container($id, $checked){
		$styles = [];
		
		if($checked){
			echo '<style>';
					echo '#' . $id . ' .container_fluid { max-width: 1730px; }';
				echo '}';

				echo '@media(max-width:1200px){';
					echo '#' . $id . ' .container_fluid { padding: 0 20px; }';
				echo '}';

				echo '@media(max-width:768px){';
					echo '#' . $id . ' .container_fluid { padding: 0 15px; }';
				echo '}';
			echo '</style>';
		}
	}

	

}

new container_Styles();