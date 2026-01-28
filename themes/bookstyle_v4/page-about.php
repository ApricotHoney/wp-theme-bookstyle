<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        
        <div class="content-container">
            <header class="unified-header">
                <h1 class="unified-title-en">About</h1>
                <p class="unified-title-jp">Book Styleについて</p>
            </header>

            <section class="unified-section unified-intro">
                <div class="unified-intro-text">
                    <h3 class="icon-heading">BOOKSTYLEについて</h3>
                    <p class="unified-lead">「いつでも、どこでも<span class="marker">読書の時間をもっと楽しいものに</span>」</p>
                    
                    <p>
                        お気に入りの本、手帳を<span class="marker">自分だけのオリジナルな一冊</span>にしたい！<br>
                        簡単に、手軽に、おしゃれなブックカバーを作りたい！<br>
                        外出先でも人の目を気にせず、<span class="marker">読書の時間を楽しみたい！</span><br>
                        自宅の本棚をもっとオシャレにしたい！
                    </p>
                    
                    <p>
                        そんな思いからBook Styleは誕生しました。<br>
                        Book Styleのブックカバーデザイン、しおりデザインは<br>
                        全て管理人が試行錯誤しながら一つ一つ制作しています。<br>
                        あなたの大切な一冊にぴったりのデザインが見つかると嬉しいです。
                    </p>
                    
                    <p>
                        Book Styleは<span class="marker">無料でブックカバーのデザインをダウンロード</span>できるサイトです。<br>
                        デザインをダウンロードされた時点で、利用規約に同意したものとみなします。<br>
                        下記の「利用規約」をよく読まれた上で正しくご利用ください。<br>
                        商用利用については<a href="#">noteを参照</a>ください
                    </p>
                    
                    <p>
                        ブックカバーの折り方は<a href="<?php echo home_url('/howto'); ?>">How toページ</a>をご覧ください。
                    </p>
                    
                    <p style="margin-top: 20px; font-size: 0.9em; color: #999; text-align: right;">サイト開設 : 2010/2/22</p>
                </div>
                <div class="unified-intro-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/about_intro.jpg" alt="Reading a book">
                </div>
            </section>

            <section class="unified-section">
                <h3 class="icon-heading">広告掲載について</h3>
                <p>
                    サイト内にいくつか広告を掲載しております。<br>
                    サイトを見る上で煩わしく感じることもあるかと思いますが、Book Styleはこの広告によって<br>
                    サイト運営が成り立っておりますので、ご理解くださいますよう、よろしくお願い致します。
                </p>
            </section>

            <section class="unified-section">
                <h2 class="unified-h2">利用規約</h2>
                <p class="ta-c mb30">利用規約をよく読み、ご理解した上でブックカバーをお使いください。</p>

                <div class="term-block">
                    <h3 class="icon-heading">著作権・肖像権について</h3>
                    <p>
                        本サイトに関する著作権は、Book Style及びねりに帰属します。<br>
                        本サイト上で承諾されている場合を除き、本サイトに掲載または表示されているデータ・写真などの全部または一部を<br>
                        いかなる形式また手段によっても複製・改変・転用することを禁じます。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">免責事項</h3>
                    <p>
                        Book Styleは、本サイトに情報を掲載する際には万全を期していますが、それらの情報が正確であるか、<br>
                        最新であるか、またお客様にとって有用であるか等について、一切保証致しません。<br>
                        Book Styleは、お客様が本サイトをご利用になったことにより生じたいかなる損害についても責任を負いません。<br>
                        本サイトで公開されている情報の変更、削除等は、原則としてお客様への予告なしに行います。<br>
                        また、止むを得ない事由により、本サイトの公開を中断あるいは中止させて頂くことがあります。<br>
                        Book Styleは、本サイトの情報の変更、削除、公開の中断、中止により、お客様に生じたいかなる損害についても責任を負いません。
                    </p>
                </div>
            </section>

        </div>

    </div>
</main>

<?php get_footer(); ?>
