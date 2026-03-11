<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">

        <header class="unified-header">
            <h1 class="unified-title-en">ABOUT</h1>
            <p class="unified-title-jp">Book Styleについて</p>
        </header>
        <div class="content-container">

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
                        商用利用については<a href="#" class="bd-link">noteを参照</a>ください
                    </p>

                    <p>
                        ブックカバーの折り方は<a href="<?php echo home_url('/howto'); ?>" class="bd-link">How toページ</a>をご覧ください。
                    </p>

                    <p style="margin-top: 20px; font-size: 0.9em; color: #999; text-align: right;">サイト開設 : 2010/2/22</p>
                </div>
                <div class="unified-intro-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/about_img01.png" alt="Reading a book">
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

            <div class="unified-image-full mt30">
                <img src="<?php echo get_template_directory_uri(); ?>/images/about_img02.png" alt=""
                    style="width: 100%; height: auto; display: block;">
            </div>

            <!-- 旧利用規約 ここから
            <section class="unified-section" id="ToS">
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
                    <ul>
                        <li>Book Styleは、本サイトに情報を掲載する際には万全を期していますが、それらの情報が正確であるか、<br>
                            最新であるか、またお客様にとって有用であるか等について、一切保証致しません。</li>
                        <li>Book Styleは、お客様が本サイトをご利用になったことにより生じたいかなる損害についても責任を負いません。<br>
                            本サイトで公開されている情報の変更、削除等は、原則としてお客様への予告なしに行います。<br>
                            また、止むを得ない事由により、本サイトの公開を中断あるいは中止させて頂くことがあります。</li>
                        <li>Book Styleは、本サイトの情報の変更、削除、公開の中断、中止により、お客様に生じたいかなる損害についても責任を負いません。</li>
                    </ul>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">禁止事項</h3>
                    <ul>
                        <li>本サイトの素材を加工し、配布・販売・レンタルする行為</li>
                        <li>本サイトの素材をお客様のサイトなどで再配布する行為</li>
                        <li>Book Styleのアイデアを使って類似品を制作し商品として販売する行為</li>
                        <li>商用利用(オークションやハンドメイド商品の販売含む）のスマホケース、タブレットケース、書籍の表紙、ラッピング、</li>
                        <li>タグ、台紙、袋、ショップカード、フライヤーとしての利用</li>
                        <li>著作・商標権等の知的財産権などの権利を侵害する、侵害するおそれのある利用</li>
                        <li>ブログやHPのデザイン（サイトの背景、バナーの背景など）での利用</li>
                        <li>元のデザインを大きく損なうようなデザインの改変、文字入れなどの行為</li>
                    </ul>
                    <p class="mt30">
                        Book Styleのデザインがスマホカバーやタブレットカバー等に無断で使用・販売されている事例がございました。<br>
                        今のところそういった物販販売は一切しておりませんので、<br>
                        もしもBook Styleのデザインがそういったことに使われていましたらご連絡頂けると助かります。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">承諾事項</h3>
                    <ul>
                        <li>ご友人に送るプレゼントとしての利用</li>
                        <li>店舗内のディスプレイとしての利用</li>
                        <li>商品写真の背景小物としての利用※販売は不可</li>
                        <li>学校・図書館等の公共機関でプレゼントとして利用・配布</li>
                    </ul>
                </div>
            </section>
            旧利用規約 ここまで -->

            <section class="unified-section" id="ToS">
                <h2 class="unified-h2">利用規約</h2>
                <p class="ta-c mb30">本サイトのデザインをご利用いただく際は、以下の規約を必ずお読みください。ご利用いただいた時点で、本規約に同意したものとみなします。</p>

                <div class="term-block">
                    <h3 class="icon-heading">1. 著作権について</h3>
                    <p>
                        本サイトに掲載されているすべてのブックカバーデザイン、データ、写真、テキスト等の著作権は「Book
                        Style」および「ねり」に帰属します。ライセンスの購入は「利用権」の許諾であり、著作権を譲渡するものではありません。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">2. 利用区分の詳細</h3>
                    <p>用途に合わせて、以下の2つのプランがあります。</p>
                    <div class="table-wrap mt20">
                        <table class="tos-table">
                            <thead>
                                <tr>
                                    <th>項目</th>
                                    <th>無料版（個人利用）</th>
                                    <th>商用ライセンス（有料版）</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>利用対象</th>
                                    <td>個人、友人へのプレゼント、公共機関（学校・図書館等）</td>
                                    <td>法人、個人事業主、収益を伴う活動</td>
                                </tr>
                                <tr>
                                    <th>クレジット表記</th>
                                    <td>必須（サイト名やURLの記載）</td>
                                    <td>不要（任意）</td>
                                </tr>
                                <tr>
                                    <th>許諾範囲</th>
                                    <td>非営利目的のみ</td>
                                    <td>ビジネス・営利目的を含む利用</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">3. クレジット表記の要否について</h3>
                    <p>本サイトのデザインを利用する際のクレジット表記（サイト名やURLの記載）については、以下の通りです。</p>

                    <div class="tos-credit-box mt20">
                        <h4>無料版（個人利用）の場合：表記必須</h4>
                        <ul>
                            <li><strong>SNSでの利用：</strong>投稿内にサイト名「Book Style」またはサイトURL（http://bookstyle.xyz）を含めてください。
                            </li>
                            <li><strong>物理的な利用：</strong>可能な範囲で、当サイトのデザインである旨を周囲に伝えていただけると幸いです。</li>
                        </ul>
                    </div>

                    <div class="tos-credit-box mt20">
                        <h4>商用ライセンス（有料版）の場合：表記不要</h4>
                        <ul>
                            <li>ライセンス購入者は、クレジット表記なしで自由にご利用いただけます。</li>
                        </ul>
                    </div>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">4. 商用利用の許諾範囲（OK事例）</h3>
                    <p>商用ライセンスをご購入いただいた場合、デザインを「装飾や背景などの演出の一部」として、以下の用途にご利用いただけます。</p>
                    <ul class="mt10 tos-list">
                        <li><strong>撮影用背景・小物:</strong> 写真館、フォトスタジオ、YouTube等の動画撮影における背景や装飾小物としての利用。</li>
                        <li><strong>広告・PR制作物:</strong> 企業やサービスのWebバナー、SNS広告、チラシ等のデザインパーツとしての利用。</li>
                        <li><strong>デジタルコンテンツ:</strong> Webメディア、ブログ、ニュースサイト等の記事内アイキャッチ画像としての利用。</li>
                        <li><strong>店舗装飾:</strong> カフェや書店等における、ディスプレイやインテリアとしての利用。</li>
                    </ul>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">5. デザインを主目的とした利用の制限と禁止事項</h3>
                    <p>本サイトのデザインそのものが「商品価値の主体（売り）」となる利用は、無料・有料を問わず一律禁止いたします。</p>
                    <ul class="mt10 tos-list">
                        <li><strong>素材そのものの配布・販売:</strong> データをそのまま、あるいは軽微な加工のみで素材として再配布・販売する行為。</li>
                        <li><strong>デザインを主役とした商品化:</strong>
                            本デザインをそのままプリントし、ブックカバー、ポストカード、ラッピングペーパー等の「独立した商品」として販売・配布する行為。</li>
                        <li><strong>類似品の制作:</strong> 当サイトのアイデアやデザインをトレース・模倣した商品の販売。</li>
                        <li><strong>ロゴ・商標登録:</strong> デザインをロゴの一部として使用し、商号や商標を登録する行為。</li>
                        <li><strong>公序良俗に反する利用:</strong> アダルト、違法活動、誹謗中傷を目的とした媒体での利用。</li>
                    </ul>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">6. 免責事項</h3>
                    <ul class="mt10 tos-list">
                        <li>素材の利用によって生じたいかなる損害についても、Book Styleは一切の責任を負いません。</li>
                        <li>サイト内の情報は予告なく変更、削除、公開の中断を行う場合があります。これに伴う損害についても責任を負いかねます。</li>
                    </ul>
                </div>

                <div class="term-block mt30">
                    <h2 class="unified-h2">よくある質問</h2>
                    <ul>
                        <li>Q.フリーペーパーやその他書籍の表紙として利用したい<br>
                            A.禁止事項に違反しない限り、利用可能です。<a href="<?php echo home_url('/contact'); ?>"
                                class="bd-link">MAILよりお問い合わせください</a></li>
                        <li>Q.自身のサイト・ブログ等でBook Styleを紹介したい<br>
                            A.大歓迎です！サイトの画像やブックカバーの画像を引用する場合、その画像がBook Styleのものであることを明示してください。</li>
                        <li>Q.その他メディアでBook Styleのことを記事として掲載したい<br>
                            A.基本的にはOKです。記事の内容を確認致しますので、<a href="<?php echo home_url('/contact'); ?>"
                                class="bd-link">MAILよりお問い合わせ</a>ください。すぐにご返信できない場合もございますので、余裕を持ってご連絡ください。</li>
                    </ul>
                </div>
            </section>

            <section class="unified-section">
                <h2 class="unified-h2">プライバシーポリシー</h2>
                <p class="ta-c mb30">Book Style（以下「当サイト」）は、以下のとおり個人情報保護方針を定め、個人情報保護の仕組みを構築し、個人情報の保護を推進致します。</p>

                <div class="term-block">
                    <h3 class="icon-heading">個人情報の管理</h3>
                    <p>
                        当サイトは、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備安全対策を実施し個人情報の厳重な管理を行ないます。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">個人情報の利用目的</h3>
                    <p>
                        お客さまからお預かりした個人情報は、当サイトからのご連絡やご案内、ご質問に対する回答として、電子メールや資料のご送付に利用いたします。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">個人情報の第三者への開示・提供の禁止</h3>
                    <p>
                        当サイトは、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。
                    </p>
                    <ul>
                        <li>お客さまの同意がある場合</li>
                        <li>法令に基づき開示することが必要である場合</li>
                    </ul>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">個人情報の安全対策</h3>
                    <p>
                        当サイトは、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策を講じています。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">ご本人の照会</h3>
                    <p>
                        お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">法令、規範の遵守と見直し</h3>
                    <p>
                        当サイトは、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。
                    </p>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">お問い合せ</h3>
                    <p>
                        当サイトの個人情報の取扱に関するお問い合せは<a href="<?php echo home_url('/contact'); ?>"
                            class="bd-link">MAIL</a>よりご連絡ください。
                    </p>
                </div>
            </section>

        </div>

    </div>
</main>

<?php get_footer(); ?>