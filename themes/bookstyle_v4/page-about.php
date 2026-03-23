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
                        商用利用については<a href="#ToS" class="bd-link">利用規約</a>をご覧ください
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
                                    <td>可能な限り記載（サイト名やURLの記載）</td>
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
                        <h4>無料版（個人利用）の場合：可能な限り記載</h4>
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
                        <li><strong>書籍表紙：</strong> 商業出版物の表紙デザインとしての利用。</li>
                    </ul>
                </div>

                <div class="term-block mt30">
                    <h3 class="icon-heading">5. デザインを主目的とした利用の制限と禁止事項</h3>
                    <p>本サイトのデザインそのものが「商品価値の主体（売り）」となる利用は、無料・有料を問わず一律禁止いたします。</p>
                    <ul class="mt10 tos-list">
                        <li><strong>素材そのものの配布・販売:</strong> データをそのまま、あるいは軽微な加工のみで素材として再配布・販売する行為。</li>
                        <li><strong>デザインを主役とした商品化:</strong>
                            本デザインをそのままプリントし、ブックカバー、ポストカード、ラッピングペーパー、スマホカバー等の「独立した商品」として販売・配布する行為。</li>
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

                    <h3 class="icon-heading">1. ライセンスについて</h3>
                    <div class="tos-credit-box">
                        <h4>Q. 商用ライセンスを購入すれば、どんなことでも使えますか？</h4>
                        <p><strong>A.
                            </strong>基本的にはビジネス用途（広告、バナー、店舗装飾など）にご利用いただけますが、デザインをそのまま「商品」として販売する行為や、ロゴマークとしての登録、公序良俗に反する媒体での利用は禁止しております。詳細は「利用規約」をご確認ください。
                        </p>
                    </div>
                    <div class="tos-credit-box mt20">
                        <h4>Q. 無料版と有料版（商用ライセンス）で、デザイン自体に違いはありますか？</h4>
                        <p><strong>A. </strong>デザインは同じですが、有料版はより高画質（印刷に適した300dpi相当）なデータを提供しており、クレジット表記も不要となります。</p>
                    </div>

                    <h3 class="icon-heading">2. 印刷・データ仕様について</h3>
                    <div class="tos-credit-box mt20">
                        <h4>Q. 印刷すると画像がボヤけてしまいます。</h4>
                        <p><strong>A.
                            </strong>無料配布している画像はWeb表示用の解像度となっているため、大判での印刷には適さない場合があります。綺麗に印刷したい場合は、高解像度データが含まれる「有料版」のご購入をお勧めいたします。
                        </p>
                    </div>
                    <div class="tos-credit-box mt20">
                        <h4>Q. データの形式は何ですか？</h4>
                        <p><strong>A. </strong>基本的にPNG形式で提供しております。</p>
                    </div>

                    <h3 class="icon-heading">3. 加工・改変について</h3>
                    <div class="tos-credit-box mt20">
                        <h4>Q. デザインの上に文字を入れたり、色を変えたりしてもいいですか？</h4>
                        <p><strong>A. </strong>タイトルの文字入れなどの加工は自由に行っていただけます。ただし、元のデザインの意図を大きく損なうような過度な改変はご遠慮ください。</p>
                    </div>

                    <h3 class="icon-heading">4. 表記・報告について</h3>
                    <div class="tos-credit-box mt20">
                        <h4>Q. サイト名やリンク（クレジット）の記載は必須ですか？</h4>
                        <p><strong>A. </strong>無料版をご利用の場合は必ず「Book
                            Style」の名称またはURLの記載をお願いします。商用ライセンスをご購入いただいた場合は、表記なしでご利用いただけます。</p>
                    </div>
                    <div class="tos-credit-box mt20">
                        <h4>Q. 実際に使ったことを報告する必要はありますか？</h4>
                        <p><strong>A. </strong>必須ではありませんが、SNSなどで「#BookStyle」のハッシュタグをつけてシェアしていただけると、制作者として大変励みになります。</p>
                    </div>
                    <div class="tos-credit-box mt20">
                        <h4>Q. 自身のサイト・ブログ等でBook Styleを紹介したい</h4>
                        <p><strong>A. </strong>大歓迎です！サイトの画像やブックカバーの画像を引用する場合、その画像がBook Styleのものであることを明示してください。</p>
                    </div>
                    <div class="tos-credit-box mt20">
                        <h4>Q. その他メディアでBook Styleのことを記事として掲載したい</h4>
                        <p><strong>A. </strong>基本的にはOKです。記事の内容を確認致しますので、<a href="<?php echo home_url('/contact'); ?>"
                                class="bd-link">MAILよりお問い合わせ</a>ください。すぐにご返信できない場合もございますので、余裕を持ってご連絡ください。</p>
                    </div>
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