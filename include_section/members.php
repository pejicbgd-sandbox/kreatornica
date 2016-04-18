 <?php require('includes/init.php');?>
 <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">Osnivači</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <ul class="timeline">
                <?php foreach($members as $index => $member) {
                	if($index % 2 == 0) {
                		echo '<li class="timeline-inverted">';
                	} else {
                		echo '<li>';
                	}
            	?>
                	<div class="timeline-image">
                        <img class="img-circle img-responsive" src="img/members/<?php echo $member['img']; ?>" alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                           <h4 class="subheading"><?php echo $member['name']; ?></h4>
                        </div>
                        <div class="timeline-body">
						  <p class="text-muted"><?php echo $member['text']; ?></p>
                        </div>
                    </div>
                    </li>
                <?php
                }
                ?>
         	</ul>
        </div>
    </div>
					
	<div class="member-unit collapse-group">
	  	
		<div class="row ">
			<div class="col-lg-12 ">
				<ul class="timeline">
				  <li class="timeline-image ">
					<a href="#">
						<div class="timeline-image link-bg btn">
							<h4><br>Članovi</h4>
						</div>
						</a>
					</li>
					<?php foreach($members as $index => $member) {
						if($index % 2 == 0) {
	                		echo '<li class="timeline-inverted collapse">';
	                	} else {
	                		echo '<li class="collapse">';
	                	}
	            	?>
						<div class="timeline-image">
							<img class="img-circle img-responsive" src="img/members/<?php echo $member['img']; ?>" alt="">
						</div>
						<div class="timeline-panel ">
							<div class="timeline-heading">
							   <h4 class="subheading"><?php echo $member['name']; ?></h4>
							</div>
							<div class="timeline-body">
								
						      <p> class="text-muted"><?php echo $member['text']; ?></p>
								
							</div>
						</div>
					</li>
					<?php
					}
					?>
				
					<ul class="timeline">
					<?php foreach($members as $index => $member) {
						if($index % 2 == 0) {
	                		echo '<li class="timeline-inverted collapse">';
	                	} else {
	                		echo '<li class="collapse">';
	                	}
	            	?>
						<div class="timeline-image">
							<img class="img-circle img-responsive" src="img/members/<?php echo $member['img']; ?>" alt="">
						</div>
						<div class="timeline-panel ">
							<div class="timeline-heading">
							   <h4 class="subheading"><?php echo $member['name']; ?></h4>
							</div>
							<div class="timeline-body">
								
						      <p> class="text-muted"><?php echo $member['text']; ?></p>
								
							</div>
						</div>
					</li>
					<?php
					}
					?>
					
				</ul>
			</div>
		</div>
	</div>
