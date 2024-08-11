<?php 
// Inclure l'en-tête (header)
include '../includes/header.php'; 
?>

<main>
    <!-- Description de l'entreprise -->
    <section class="intro">
        <h2>Bienvenue chez Afghan Market</h2>
        <p>Chez Afghan Market, nous sommes dédiés à offrir une expérience authentique avec des produits soigneusement sélectionnés en provenance directe d'Afghanistan. Découvrez notre sélection variée de produits et plongez dans la richesse de la culture afghane.</p>
    </section>

    <!-- Qui sommes-nous ? -->
    <section class="about-us">
        <h2>Qui Sommes-Nous ?</h2>
        <p>Afghan Market est une entreprise familiale fondée avec la passion de partager la culture afghane à travers ses produits uniques. Depuis notre ouverture, nous nous efforçons d'offrir à nos clients des produits de qualité qui respectent les traditions et l'authenticité de l'Afghanistan. Notre mission est de vous offrir une expérience inoubliable en vous apportant les saveurs et les traditions de notre pays.</p>
    </section>

    <!-- Horaires d'ouverture -->
    <section class="opening-hours">
        <h2>Horaires d'Ouverture</h2>
        <img src="../images/horaires.png" alt="Horaires d'ouverture" class="opening-hours-img">
    </section>

<!-- Suivez-nous -->
<section class="follow-us">
    <h2>Suivez-nous</h2>
    <p>Suivez-nous sur TikTok pour découvrir nos dernières nouveautés et promotions !</p>
    <div class="tiktok-videos">
        <div class="tiktok-video">
            <a href="https://www.tiktok.com/@afghanmarket35?_t=8ohoa27IWCP&_r=1" target="_blank" rel="noopener noreferrer">
            <p>TikTok Afghan Market</p>
            <img src="../images/t1.jpg" alt="TikTok Afghan Market">
            </a>
        </div>
        <div class="tiktok-video">
            <a href="https://www.tiktok.com/@sami.3547?_t=8ohocoeZGoT&_r=1" target="_blank" rel="noopener noreferrer">
            <p>Compte secondaire</p>
            <img src="../images/t2.jpg" alt="Compte secondaire">
            </a>
        </div>
    </div>
</section>


    
    <!-- Où nous trouver ? -->
    <section class="find-us">
        <h2>Où Nous Trouver ?</h2>

        <div id="map"></div>

        <!-- prettier-ignore -->
        <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyDBhr2bzsJw9ly0INwRdQw3QvK1jx0YfL8", v: "weekly"});</script>



        <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed/v1/place?q=14+rue+de+l%27Alma,+35000+Rennes,+France&key=AIzaSyDBhr2bzsJw9ly0INwRdQw3QvK1jx0YfL8"
            allowfullscreen>
        </iframe>
        </div>
    </section>
    
<!-- Meilleurs Avis Google avec Carrousel -->
<section class="google-reviews">
        <h2>Vos retours !</h2>
        <div class="carousel-container">
            <div class="carousel">
                <div class="review">
                    <p><strong>Ismail Mazladi</strong></p>
                    <p>"Très bonne expérience d'achat avec des produits qualitatifs avec un<br> 
                        prix abordable. Pour tous ceux qui sont intéressé aux produits du<br> 
                        Moyen Orient et asiatique je vous le conseil vivement.<br>
                        De plus, le personnel est très aimable et à l'écoute."</p>
                    <p>★★★★★</p>
                </div>
                <div class="review">
                    <p><strong>Venus XIII</strong></p>
                    <p>"La dame est vraiment adorable et chaleureuse et j'ai découvert plein <br>
                    de produits orientaux que je ne connaissais pas. Aller à Rennes quand <br>
                    on est parisienne et revenir avec des produits afghans et iraniens <br>
                    c'est un peu un comble. J'ai hâte d'étudier les cuisines de ces deux <br>
                    pays pour me faire un stock lors de mon prochain séjour."</p>
                    <p>★★★★★</p>
                </div>
                <div class="review">
                    <p><strong>Mathilde Girard Fégli</strong></p>
                    <p>"Un lieu où l'on peut trouver ce qui est introuvable ailleurs. <br>
                    Permet aussi de découvrir des spécialités très peu répandues en <br>
                    Europe. Accueil toujours sympathique."</p>
                    <p>★★★★★</p>
                </div>
                <!-- Ajoutez d'autres avis ici -->
            </div>
            <button class="carousel-button prev">❮</button>
            <button class="carousel-button next">❯</button>
        </div>
    </section>

</main>

<?php 
// Inclure le pied de page (footer)
include '../includes/footer.php'; 
?>

<script>
    // JavaScript pour le carrousel
    const carousel = document.querySelector('.carousel');
const reviews = document.querySelectorAll('.review');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
let index = 0;

function showReview(index) {
    const reviewWidth = carousel.querySelector('.review').offsetWidth;
    carousel.style.transform = `translateX(${-index * reviewWidth}px)`;
}

prevButton.addEventListener('click', () => {
    index = (index > 0) ? index - 1 : reviews.length - 1;
    showReview(index);
});

nextButton.addEventListener('click', () => {
    index = (index < reviews.length - 1) ? index + 1 : 0;
    showReview(index);
});

// Initial call to set the correct position
showReview(index);


</script>