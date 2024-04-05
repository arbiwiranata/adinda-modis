<?php

class AdminBeranda extends Form {

    public function getForm() {
        return array (
            'title' => 'Beranda',
            'layout' => array (
                'name' => 'full-width',
                'data' => array (
                    'col1' => array (
                        'type' => 'mainform',
                    ),
                ),
            ),
        );
    }

    public function getFields() {
        return array (
            array (
                'type' => 'Text',
                'value' => '<style>
	.main-header {
	    background-image: url(\"app/static/img/img-beranda.png\");
	    background-repeat: no-repeat;
	    background-position: center;
	    background-size: cover;
	    width: 100%;
	    height:100vh;  /* responsive height */
	    overflow:auto;
	}

	.img-modal {
	    background-image: url(\"app/static/img/img-modal.png\");
	    background-repeat: no-repeat;
	    background-position: center;
	    background-size: cover;
	    width: 100%;
	    height: max-content;  /* responsive height */
	}
</style>',
            ),
            array (
                'type' => 'Text',
                'value' => '<div class=\"main-header\">
	<div class=\"container\">
		<section class=\"pt-5 pb-3 ps-2\">
			<div class=\"row row-cols-2\">
				<div class=\"col\">
					<h1 class=\"grandstander-9\"><span class=\"teks-biru\">ADINDA</span> <span class=\"teks-merah\">MODIS</span></h1>
				</div>
				<div class=\"col text-end\">
					<div class=\"dropdown\">
					  	<button class=\"button button-abu button-kecil dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
					    <i class=\"fa-solid fa-gear\"></i>
					  	</button>
					  	<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton1\">
					    	<li><a class=\"dropdown-item\" href=\"#\"><i class=\"fa-solid fa-user\"></i> Admin</a></li>
					    	<li><a class=\"dropdown-item\" href=\"\" data-bs-toggle=\"modal\" data-bs-target=\"#logout\"><i class=\"fa-solid fa-right-to-bracket\"></i> Logout</a></li>
					  	</ul>
					</div>
				</div>
			</div>
		</section>
		<section class=\"pt-1 pb-5 ps-2\">
			<!-- <p class=\"teks-putih teks-20\"><b>Menu</b></p> -->
			<div class=\"row\">
				<div class=\"col text-center\">
					<a href=\"#\"><img class=\"card-pulse\" src=\"app/static/img/data-anak.png\" width=\"70%\"></a>
				</div>
				<div class=\"col text-center\">
					<a href=\"#\"><img class=\"card-pulse\" src=\"app/static/img/data-master.png\" width=\"70%\"></a>
				</div>
			</div>
		</section>
	</div>
</div>

<!-- Modal -->
<div class=\"modal fade\" id=\"logout\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\">
    	<div class=\"modal-content\" style=\"border: none\">
      		<div class=\"modal-header img-modal\">
        		<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      		</div>
      		<div class=\"modal-body mt-3\">
        		Apakah anda yakin untuk <b class=\"teks-merah\">Logout</b> ?
      		</div>
      		<div class=\"modal-footer\" style=\"border-top: none\">
        		<button type=\"button\" class=\"button button-abu\" data-bs-dismiss=\"modal\">Batal</button>
        		<a type=\"button\" class=\"button button-merah\" ng-url=\"site/logout\"><i class=\"fa-solid fa-right-to-bracket\"></i> Logout</a>
      		</div>
    	</div>
    </div>
</div>',
            ),
        );
    }

}