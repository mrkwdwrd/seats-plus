<?php
if (!empty($breadcrumb)) {
?>
	<nav class="breadcrumbs">
		<ul>
			<?php
			foreach ($breadcrumb as $key => $crumb) {
			?>
				<li>
					<?php
					if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
						echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
					} else {
						echo esc_html($crumb[0]);
					}
					?>
				</li>
		<?php
			}
		}
		?>
		</ul>
	</nav>