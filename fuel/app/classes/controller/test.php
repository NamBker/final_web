		      <?php 
		      $i =0;
		      foreach ($posts as $key){
		      		Arr::get($posts,'slug','Null');


		      	$i++;
		      	if($i < 3){
		      	?>
		       		<li ><a href="/tags/search/?tags=<?php echo $key->slug ?>"><div class="sizetags"><?php echo $key->slug; ?></div></a></li>
		       	<?php
		       	}
		       	if($i>2 && i<5){
		       	?>
		       		<li ><a href="/tags/search/?tags=<?php echo $key->slug ?>"><div class="sizetags1"><?php echo $key->slug; ?></div></a></li>
		       	<?php
		       }
		       else{
		       	?>
	       		<li ><a href="/tags/search/?tags=<?php echo $key->slug ?>"><div class="sizetags2"><?php echo $key->slug; ?></div></a></li>
		       	<?php
		      		 }
		      		}
		     	  ?>
