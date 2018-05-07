<div class="breadcumb-nav">
		<div class="container">
				<div class="row">
						<div class="col-12">
								<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
												<?php if(function_exists('breadcrumb_trail')):
                          breadcrumb_trail(
                            array(
                              'separator'             => '<i class="fa fa-chevron-right"></i>',
                              'post_taxonomy'         => array(
                                  'post'    => 'category'
                              ),
                              'show_browse'           => false,
                              'show_on_front'         => false,
                            )
                          ); ?>
                        <?php endif; ?>
										</ol>
								</nav>
						</div>
				</div>
		</div>
</div>
