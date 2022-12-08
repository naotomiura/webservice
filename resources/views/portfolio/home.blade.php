<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Naoto - Portfolio</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>

  <body>
    <header id="header">
      <h1 class="site-title"><a href="index.html"></a></h1>
      <nav>
        <ul>
          <li><a href="#about">私について</a></li>
          <!-- <li><a href="#works">実績</a></li> -->
          <li><a href="#news">できること</a></li>
          <li><a href="#contact">お問い合わせ</a></li>
          <!-- <li>
            <a href="https://www.instagram.com/" target="_blank">
              <img class="icon" src="./img/icon-instagram.png" alt="インスタグラム">
            </a>
          </li> -->
        </ul>
      </nav>
    </header>

    <main>
      <div id="mainvisual">
        <picture>
          <source media="(max-width: 600px)" srcset={{ asset('images/icon.jpg') }}>
          <img src={{ asset('images/icon.jpg') }}>
        </picture>
      </div>

      <section id="about" class="wrapper">
        <h2 class="sec-title">私について</h2>
        <ul>
          <li>三浦　直人</li>
          <li>【経歴】</li>
          <li>・2019年~ 東北大学工学部情報系</li>
          <li>・2021年4月~2021年12月　プログラミングスクール講師</li>
          <br>
          <li>【可能な業務】</li>
          <li>・HTML/CSSコーディング</li>
          <!-- <li>tel: 000-0000-0000</li> -->
          <!-- <li>url: www.xxxxxx.jp</li> -->
          <!-- <li>mail: xxx@xxxxxx.jp</li> -->
        </ul>
        <p>
          大学生なので、時間と体力は有り余るほどあり、発注していただければ、全力を案件に注ぎ込めます。半年ほど練習をしてきましたが、実績は0ですので、はじめは超低価格でお受けします。
        </p>
      </section>
      <!-- 
      <section id="works" class="wrapper">
        <h2 class="sec-title">Works</h2>
        <ul>
          <li><img src="img/works1.jpg" alt="テキストテキストテキスト"></li>
          <li><img src="img/works2.jpg" alt="テキストテキストテキスト"></li>
          <li><img src="img/works3.jpg" alt="テキストテキストテキスト"></li>
          <li><img src="img/works4.jpg" alt="テキストテキストテキスト"></li>
          <li><img src="img/works5.jpg" alt="テキストテキストテキスト"></li>
          <li><img src="img/works6.jpg" alt="テキストテキストテキスト"></li>
        </ul>
      </section> -->

      <section id="news" class="wrapper">
        <h2 class="sec-title">できること</h2>
        <dl>
          <dt>HTML</dt>
          <dd>ページの役割や機能に応じたタグの使用を心掛けています。</dd>
          <dt>CSS</dt>
          <dd>BEMのルールに沿ったCSS設計を行います。</dd>
          <!--<dt>JavaScript</dt>-->
          <!--<dd>Webサイトに簡単なアニメーションを施すことができます。</dd>-->
          <!--<dt>jQuery</dt>-->
          <!--<dd>JavaScriptと同様、Webサイトに簡単なアニメーションを施すことができます。</dd>-->
          <!--<dt>PHP</dt>-->
          <!--<dd>テンプレートタグを駆使して、WebサイトのWordPress化が可能です。</dd>-->
          <!--<dt>WordPress</dt>-->
          <!--<dd>Webサイトをお客さま自身で管理できるようサポートいたします。</dd>-->
        </dl>
      </section>

      <section id="contact" class="wrapper">
        <h2 class="sec-title">お問い合わせ</h2>
        <form action="#" method="post">
          <dl>
            <dt><label for="name">NAME</label></dt>
            <dd><input type="text" id="name" name="your-name"></dd>
            <dt><label for="email">E-mail</label></dt>
            <dd><input type="email" id="email" name="your-email"></dd>
            <dt><label for="message">MESSAGE</label></dt>
            <dd><textarea id="message" name="your-message"></textarea></dd>
          </dl>
          <div class="button"><input type="submit" value="送信"></div>
        </form>
      </section>
    </main>

    <footer id="footer">
      <p>&copy; 2020 My Work</p>
    </footer>

  </body>

</html>