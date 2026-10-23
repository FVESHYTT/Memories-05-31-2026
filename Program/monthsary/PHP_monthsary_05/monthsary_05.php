<?php
/* Pine tree generator: pure-CSS trees, positions are fixed by the seed */
function bg_pines($count, $seed, $min, $max, $layer)
{
    mt_srand($seed);
    for ($i = 0; $i < $count; $i++) {
        $x = round(($i + 0.5) * 100 / $count + mt_rand(-30, 30) / 10, 1);
        $h = mt_rand($min, $max);
        echo '<span class="bg-pine bg-pine-' . $layer . '" style="--x:' . $x . '%;--h:' . $h . 'px"></span>' . "\n";
    }
}

function bg_forest($seed)
{
    echo '<div class="bg-forest" aria-hidden="true">';
    bg_pines(16, $seed, 120, 210, 'back');
    bg_pines(10, $seed + 7, 150, 255, 'front');
    echo '</div>';
}

/* Photos: id => [title, caption]  (files live in image/monthsary_5/) */
$pics = [
    'b1'  => ['Caught Looking', 'Even with the whole view in front of us, I still looked at you.'],
    'b2'  => ['On Top of the World', 'Pine trees, cool air, and your arms around me. I could stay on this rock forever.'],
    'b3'  => ['Arms Wide Open', 'Our whole sky. Thumbs up, heart full.'],
    'b4'  => ['Hydrangea Hugs', 'A whole field of blooms, and you are still the prettiest view.'],
    'b5'  => ['City Lights', 'Baguio glowing below us, and you glowing beside me.'],
    'b6'  => ['Fog and Heart Hands', 'We could barely see the view, but I never needed it with you.'],
    'b7'  => ['Four Frames, One Forever', 'Our Session Road photobooth strips: silly, sweet, and so us.'],
    'b8'  => ['Sunshine Rows', 'Yellow, orange, and your head on my shoulder.'],
    'b9'  => ['Our Little Bench', 'Mountains in front of us, you right beside me.'],
    'b10' => ['Quiet Moment', 'No words needed, just the view and us.'],
    'b11' => ['The King\'s Throne', 'Found our own throne in the mist at the Igorot Stone Kingdom.'],
];

function bg_fig($id, $cls)
{
    global $pics;
    list($t, $c) = $pics[$id];
    $cap = htmlspecialchars($t . ' — ' . $c, ENT_QUOTES);
    echo '<figure class="bg-pic ' . $cls . '"><button type="button" class="bg-zoom" data-cap="' . $cap . '">'
       . '<img src="../image/monthsary_5/' . $id . '.jpg" alt="' . htmlspecialchars($t, ENT_QUOTES) . '" loading="lazy" decoding="async" onerror="this.style.display=\'none\'">'
       . '</button><figcaption><h3>' . htmlspecialchars($t) . '</h3><p>' . htmlspecialchars($c) . '</p></figcaption></figure>' . "\n";
}

/* Bouquet: [type, x, y, diameter] on a 340 x 420 canvas, stems meet at (170, 400) */
$flowers = [
    ['radial bg-sun', 170, 70, 98],
    ['radial bg-sun', 92, 118, 84],
    ['radial bg-sun', 250, 118, 84],
    ['radial bg-daisy', 38, 165, 44],
    ['radial bg-daisy', 302, 165, 44],
    ['hydra', 62, 207, 56],
    ['hydra', 278, 207, 56],
    ['rose', 128, 172, 62],
    ['rose', 212, 172, 62],
    ['rose', 170, 222, 58],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chapter V · Our 5th Monthsary in Baguio ♡</title>

    <link rel="stylesheet" href="../css/main_index.css">
    <!-- Extension stylesheet: scoped to body.baguio, loads last -->
    <link rel="stylesheet" href="../css/monthsary_baguio_css.css">

</head>

<body class="baguio">

    <header class="site-header">

        <div class="logo">
            ♡ Our Forever
        </div>

        <nav class="navigation">
            <a href="../main_index.php">Home</a>
            <a href="../main_index.php#monthsaries">Our Chapters</a>
        </nav>

    </header>


    <!-- tall pines along the screen edges -->
    <div class="bg-side bg-side-left" aria-hidden="true">
        <?php bg_pines(3, 11, 170, 300, 'back'); ?>
        <?php bg_pines(2, 12, 200, 310, 'front'); ?>
    </div>
    <div class="bg-side bg-side-right" aria-hidden="true">
        <?php bg_pines(3, 21, 170, 300, 'back'); ?>
        <?php bg_pines(2, 22, 200, 310, 'front'); ?>
    </div>


    <main>

        <!-- HERO -->
        <section class="hero">

            <div class="hero-content">

                <p class="small-title">Chapter V</p>

                <h1>Our 5th Monthsary</h1>

                <p class="hero-description">
                    Five months, one cold and beautiful getaway,
                    and still choosing each other every single day.
                </p>

                <p class="bg-place">BAGUIO CITY, PHILIPPINES</p>

            </div>

            <?php bg_forest(5); ?>

        </section>


        <!-- INTRO -->
        <section class="bg-section">

            <div class="bg-narrow">

                <p class="small-title">Five Months Together</p>

                <h2>Among the Pines</h2>

                <p>
                    For our fifth monthsary we traded the everyday for the
                    cool mountain air of Baguio. Tall pine trees, quiet
                    mornings, and you beside me. Every place felt a little
                    softer because we saw it together.
                </p>

            </div>

        </section>


        <!-- OUR MOMENTS -->
        <section class="bg-section bg-gallery">

            <p class="small-title">Our Memories</p>

            <h2>Our Baguio Moments</h2>

            <p>Eleven little pieces of our favorite getaway. Tap any photo to see it bigger.</p>

            <!-- SCENE I -->
            <div class="bg-scene">
                <div class="bg-scene-head">
                    <span class="bg-scene-no">I</span>
                    <h3>Above the Clouds</h3>
                    <p>Pine trees, mountain air, and views that made us go quiet.</p>
                </div>
                <?php bg_fig('b2', 'is-wide'); ?>
                <div class="bg-polaroids">
                    <?php bg_fig('b1', 'is-polaroid'); ?>
                    <?php bg_fig('b3', 'is-polaroid'); ?>
                    <?php bg_fig('b9', 'is-polaroid'); ?>
                    <?php bg_fig('b10', 'is-polaroid'); ?>
                </div>
            </div>

            <div class="bg-divider" aria-hidden="true"><i></i><i></i><i></i></div>

            <!-- SCENE II -->
            <div class="bg-scene">
                <div class="bg-scene-head">
                    <span class="bg-scene-no">II</span>
                    <h3>Among the Flowers</h3>
                    <p>Fields of color, and you in the middle of all of it.</p>
                </div>
                <div class="bg-duo">
                    <?php bg_fig('b4', 'is-framed'); ?>
                    <?php bg_fig('b8', 'is-framed is-lower'); ?>
                </div>
            </div>

            <div class="bg-divider" aria-hidden="true"><i></i><i></i><i></i></div>

            <!-- SCENE III -->
            <div class="bg-scene">
                <div class="bg-scene-head">
                    <span class="bg-scene-no">III</span>
                    <h3>Mist and Stone</h3>
                    <p>A foggy day, a stone kingdom, and heart hands.</p>
                </div>
                <div class="bg-duo">
                    <?php bg_fig('b6', 'is-arch'); ?>
                    <?php bg_fig('b11', 'is-arch is-lower'); ?>
                </div>
            </div>

            <div class="bg-divider" aria-hidden="true"><i></i><i></i><i></i></div>

            <!-- SCENE IV -->
            <div class="bg-scene">
                <div class="bg-scene-head">
                    <span class="bg-scene-no">IV</span>
                    <h3>Session Road Nights</h3>
                    <p>When the city lit up, we kept the memories.</p>
                </div>
                <div class="bg-duo">
                    <?php bg_fig('b5', 'is-night'); ?>
                    <?php bg_fig('b7', 'is-strip'); ?>
                </div>
            </div>

        </section>


        <!-- LETTER -->
        <section class="bg-section">

            <p class="small-title">From My Heart</p>

            <h2>A Letter for You</h2>

            <div class="bg-letter">

                <p>My love,</p>

                <p>
                    Happy 5th monthsary to us. ❤️ Five months already, and
                    somehow every month feels like it brought us closer.
                    Spending this one in Baguio, away from the usual noise,
                    reminded me how much I enjoy simply being with you.
                </p>

                <p>
                    Thank you for the laughs, for your patience, and for
                    making even the coldest, most tiring moments feel warm.
                    The pine trees and the mountain air were beautiful, but
                    what I'll remember most is you beside me.
                </p>

                <p>
                    I don't know every place our story will take us, but I
                    know I want to keep walking it with you, one chapter
                    at a time.
                </p>

                <p>Happy 5th Monthsary, my love. I love you. ♡</p>

                <p class="bg-sign">— Fritz</p>

            </div>

        </section>


        <!-- PROMISES -->
        <section class="bg-section">

            <p class="small-title">Our Little Promises</p>

            <h2>Five Months, Five Promises</h2>

            <ol class="bg-promises">

                <li>
                    <span class="bg-num">1</span>
                    <div>
                        <h3>To Keep Choosing You</h3>
                        <p>On easy days and hard ones, I'll keep choosing you and what we have.</p>
                    </div>
                </li>

                <li>
                    <span class="bg-num">2</span>
                    <div>
                        <h3>To Keep Making Memories</h3>
                        <p>More trips, more small moments, more things to smile about someday.</p>
                    </div>
                </li>

                <li>
                    <span class="bg-num">3</span>
                    <div>
                        <h3>To Keep Growing Together</h3>
                        <p>Like the pines, I want us to grow taller, a little every season.</p>
                    </div>
                </li>

                <li>
                    <span class="bg-num">4</span>
                    <div>
                        <h3>To Keep Showing Up</h3>
                        <p>For the big plans and the quiet ordinary days, I'll be there.</p>
                    </div>
                </li>

                <li>
                    <span class="bg-num">5</span>
                    <div>
                        <h3>To Keep Loving You</h3>
                        <p>Most of all, my love, my time, and my heart stay with you.</p>
                    </div>
                </li>

            </ol>

        </section>


        <!-- BOUQUET -->
        <section class="bg-section bg-bouquet-section">

            <p class="small-title">Just For You</p>

            <h2>A Bouquet of Love</h2>

            <p>Sunflowers for the sunshine you bring, roses for my heart.</p>

            <div class="bg-bouquet">

                <?php foreach ($flowers as $f) :
                    $dx = $f[1] - 170;
                    $dy = 400 - $f[2];
                    $len = round(sqrt($dx * $dx + $dy * $dy));
                    $ang = round(rad2deg(atan2($dx, $dy)), 1);
                ?>
                    <span class="bg-stem" style="height:<?= $len ?>px;transform:rotate(<?= $ang ?>deg)"></span>
                <?php endforeach; ?>

                <span class="bg-leafy" style="left:44px;top:226px;transform:rotate(-32deg)"></span>
                <span class="bg-leafy" style="left:226px;top:226px;transform:scaleX(-1) rotate(-32deg)"></span>
                <span class="bg-leafy" style="left:90px;top:250px;transform:rotate(-12deg)"></span>
                <span class="bg-leafy" style="left:180px;top:250px;transform:scaleX(-1) rotate(-12deg)"></span>

                <?php foreach ($flowers as $f) : ?>
                    <?php if (strpos($f[0], 'radial') === 0) : ?>
                        <div class="bg-flower bg-<?= $f[0] ?>" style="left:<?= $f[1] ?>px;top:<?= $f[2] ?>px;--d:<?= $f[3] ?>px"><i></i><b></b></div>
                    <?php else : ?>
                        <div class="bg-flower bg-<?= $f[0] ?>" style="left:<?= $f[1] ?>px;top:<?= $f[2] ?>px;--d:<?= $f[3] ?>px"></div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="bg-wrap"></div>

            </div>


            <!-- CLICKABLE LOVE LETTER -->
            <div class="bg-letter-wrap">

                <button class="bg-envelope-btn" id="bgLetterButton" type="button" aria-expanded="false">

                    <div class="bg-envelope">

                        <div class="bg-env-back"></div>

                        <div class="bg-paper">
                            <p>Kahit anong mangyari, ikaw pa rin ang aking pipiliin sa araw-araw, habang ako ay nabubuhay.</p>
                            <p>Hibi ko,</p>
                            <span>— Zin</span>
                        </div>

                        <div class="bg-env-front"></div>
                        <div class="bg-flap"></div>

                    </div>

                    <span class="bg-hint" id="bgLetterHint">Click the letter ♡</span>

                </button>

            </div>

        </section>


        <!-- CLOSING -->
        <section class="bg-section bg-closing">

            <div class="bg-narrow">

                <p class="small-title">Until The Next Chapter</p>

                <h2>Five Months, and Still Just the Beginning</h2>

                <p>
                    Five months down and so many more waiting for us.
                    Wherever the road goes next, I hope we keep writing
                    our story together.
                </p>

                <div class="bg-heart">♡</div>

                <p class="bg-sig">Forever yours, — Fritz</p>

            </div>

            <?php bg_forest(31); ?>

        </section>

    </main>


    <footer class="site-footer">
        <p>Made with ♡ for us</p>
    </footer>

    <script src="../scripting/monthsary_05.js"></script>

</body>

</html>
