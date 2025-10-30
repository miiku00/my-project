<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript基本構文</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f7fa;
            line-height: 1.6;
        }
        
        .section {
            background: white;
            margin: 20px 0;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        
        h2 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        
        .code {
            background: #2d3748;
            color: #e2e8f0;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            margin: 10px 0;
            overflow-x: auto;
        }
        
        .output {
            background: #f7fafc;
            border-left: 4px solid #48bb78;
            padding: 10px;
            margin: 10px 0;
            border-radius: 0 5px 5px 0;
        }
        
        button {
            background: #4299e1;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        
        button:hover {
            background: #3182ce;
        }
        
        .demo {
            border: 2px dashed #cbd5e0;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            background: #f8f9fa;
        }
        
        input, select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 5px;
        }
        
        .keyword { color: #ff7b00; }
        .string { color: #22c55e; }
        .number { color: #f59e0b; }
        .comment { color: #6b7280; }
    </style>
</head>
<body>
    <h1>📚 JavaScript基本構文</h1>

    <!-- 1. 変数の宣言 -->
    <div class="section">
        <h2>✅ 1. 変数の宣言</h2>
        <div class="code">
// 変数の宣言方法<br>
<span class="comment">// 変更可能な変数</span><br>
<span class="keyword">let</span> userName = <span class="string">"田中太郎"</span> ;<br>     
<span class="comment">// 変更不可な定数</span><br>
<span class="keyword">const</span> age = <span class="number">25</span>;<br>              
<span class="comment">// 古い書き方（非推奨）</span><br>
<span class="keyword">var</span> city = <span class="string">"東京"</span>;<br>            
<span class="comment">// 文字列型</span><br>
<span class="keyword">let</span> text = <span class="string">"文字列"</span>;<br>
<span class="comment">// 数値型</span><br>
<span class="keyword">let</span> number = <span class="number">100</span>;<br>            
<span class="comment">// 真偽値型</span><br>
<span class="keyword">let</span> isTrue = <span class="keyword">true</span>;<br>          
<span class="comment">// null値</span><br>
<span class="keyword">let</span> empty = <span class="keyword">null</span>;<br>           

        </div>
        <div class="demo">
            <button onclick="showVariables()">変数の例を実行</button>
            <div id="variableOutput"></div>
        </div>
    </div>

    <!-- 2. 配列 -->
    <div class="section">
        <h2>✅ 2. 配列（Array）</h2>
        <div class="code">
<span class="comment">// 配列の作成</span><br>
<span class="keyword">let</span> fruits = [<span class="string">"りんご"</span>, <span class="string">"バナナ"</span>, <span class="string">"オレンジ"</span>];<br>
<span class="keyword">let</span> numbers = [<span class="number">1</span>, <span class="number">2</span>, <span class="number">3</span>, <span class="number">4</span>, <span class="number">5</span>];<br>

<span class="comment">// 配列の操作</span><br>
<span class="comment">// 追加</span><br>
fruits.push(<span class="string">"ぶどう"</span>);<br>
<span class="comment">// 最初の要素</span><br>
console.log(fruits[<span class="number">0</span>]);<br>
<span class="comment">// 配列の長さ</span><br>
console.log(fruits.length);<br>
        </div>
        <div class="demo">
            <button onclick="showArray()">配列の例を実行</button>
            <div id="arrayOutput"></div>
        </div>
    </div>

    <!-- 3. オブジェクト -->
    <div class="section">
        <h2>✅ 3. オブジェクト（Object）</h2>
        <div class="code">
<span class="comment">// オブジェクトの作成</span><br>
<span class="keyword">let</span> person = {
    name: <span class="string">"田中太郎"</span>,<br>
    age: <span class="number">25</span>,<br>
    city: <span class="string">"東京"</span>,<br>
    hobbies: [<span class="string">"読書"</span>, <span class="string">"映画"</span>]<br>
};<br>

<span class="comment">// プロパティへのアクセス</span><br>
console.log(person.name);       <span class="comment">// ドット記法</span><br>
console.log(person[<span class="string">"age"</span>]); <span class="comment">// ブラケット記法</span><br>
        </div>
        <div class="demo">
            <button onclick="showObject()">オブジェクトの例を実行</button>
            <div id="objectOutput"></div>
        </div>
    </div>

<!-- 4. 関数 --><br>
<div class="section"><br>
    <h2>✅ 4. 関数（Function）</h2><br>
    <div class="code"><br>
        <span class="comment">// 関数宣言</span><br>
        <span class="keyword">function</span> greet(name) {<br>
            <span class="keyword">return</span> <span class="string">"こんにちは、"</span> + name + <span class="string">"さん！"</span>;<br>
        }<br>
<br>
        <span class="comment">// アロー関数（ES6）</span><br>
        <span class="keyword">const</span> add = (a, b) => {<br>
            <span class="keyword">return</span> a + b;<br>
        };<br>
<br>
        <span class="comment">// 短縮形</span><br>
        <span class="keyword">const</span> multiply = (a, b) => a * b;<br>
    </div><br>
    <div class="demo"><br>
        <input type="text" id="nameInput" placeholder="お名前を入力"><br>
        <button onclick="callFunction()">関数を呼び出す</button><br>
        <div id="functionOutput"></div><br>
    </div><br>
</div><br>
<!-- 5. 条件分岐 --><br>
<div class="section"><br>
    <h2>✅ 5. 条件分岐（if文）</h2><br>
    <div class="code"><br>
        <span class="comment">// if文の基本</span><br>
        <span class="keyword">let</span> score = <span class="number">85</span>;<br>
<br>
        <span class="keyword">if</span> (score >= <span class="number">90</span>) {<br>
            console.log(<span class="string">"優秀です！"</span>);<br>
        } <br>
        <span class="keyword">else if</span> (score >= <span class="number">70</span>) {<br>
            console.log(<span class="string">"良好です"</span>);<br>
        } <br>
        <span class="keyword">else</span> {<br>
            console.log(<span class="string">"頑張りましょう"</span>);<br>
        }<br>
<br>
        <span class="comment">// 三項演算子</span><br>
        <span class="keyword">let</span> result = score >= <span class="number">60</span>
            ? <span class="string">"合格"</span>
            : <span class="string">"不合格"</span>;<br>
    </div><br>
    <div class="demo"><br>
        <input type="number" id="scoreInput" placeholder="点数を入力" min="0" max="100"><br>
        <button onclick="checkScore()">判定する</button><br>
        <div id="conditionOutput"></div><br>
    </div><br>
</div><br>
<br>
<!-- 6. 繰り返し処理 --><br>
<div class="section"><br>
    <h2>✅ 6. 繰り返し処理（ループ）</h2><br>
    <div class="code"><br>
        <span class="comment">// for文</span><br>
        <span class="keyword">for</span> (<span class="keyword">let</span> i = <span class="number">0</span>; i < <span class="number">5</span>; i++) {<br>
            console.log(<span class="string">"回数: "</span> + i);<br>
        }<br>
<br>
        <span class="comment">// while文</span><br>
        <span class="keyword">let</span> count = <span class="number">0</span>;<br>
        <span class="keyword">while</span> (count < <span class="number">3</span>) {<br>
            console.log(<span class="string">"カウント: "</span> + count);<br>
            count++;<br>
        }<br>
<br>
        <span class="comment">// 配列の繰り返し</span><br>
        <span class="keyword">let</span> colors = [<span class="string">"赤"</span>, <span class="string">"青"</span>, <span class="string">"緑"</span>];<br>
        colors.forEach(color => console.log(color));<br>
    </div><br>
    <div class="demo"><br>
        <input type="number" id="loopCount" placeholder="繰り返し回数" min="1" max="10" value="5"><br>
        <button onclick="showLoop()">ループを実行</button><br>
        <div id="loopOutput"></div><br>
    </div><br>
</div><br>
<br>
<!-- 7. イベント処理 --><br>
<div class="section"><br>
    <h2>✅ 7. イベント処理</h2><br>
    <div class="code"><br>
        <span class="comment">// クリックイベント</span><br>
        document.getElementById(<span class="string">"myButton"</span>)<br>
            .addEventListener(<span class="string">"click"</span>, <span class="keyword">function</span>() {<br>
                alert(<span class="string">"ボタンがクリックされました！"</span>);<br>
            });<br>
<br>
        <span class="comment">// アロー関数での書き方</span><br>
        document.getElementById(<span class="string">"myButton"</span>)<br>
            .addEventListener(<span class="string">"click"</span>, () => {<br>
                console.log(<span class="string">"クリック！"</span>);<br>
            });<br>
<br>
        <span class="comment">// HTML属性での指定</span><br>
        <span class="comment">// &lt;button onclick="myFunction()"&gt;クリック&lt;/button&gt;</span><br>
    </div><br>
    <div class="demo"><br>
        <button id="eventButton">イベントボタン</button><br>
        <button onclick="showMessage()">onclick属性</button><br>
        <div id="eventOutput"></div><br>
    </div><br>
</div><br>
<br>



    <script>
        // 変数の例
        function showVariables() {
            let userName = "田中太郎";
            const age = 25;
            let isStudent = true;
            
            document.getElementById('variableOutput').innerHTML = `
                <div class="output">
                    <strong>実行結果:</strong><br>
                    名前: ${userName} (文字列)<br>
                    年齢: ${age} (数値)<br>
                    学生: ${isStudent} (真偽値)<br>
                    データ型: ${typeof userName}, ${typeof age}, ${typeof isStudent}
                </div>
            `;
        }
        
        // 配列の例
        function showArray() {
            let fruits = ["りんご", "バナナ", "オレンジ"];
            fruits.push("ぶどう");
            
            document.getElementById('arrayOutput').innerHTML = `
                <div class="output">
                    <strong>実行結果:</strong><br>
                    配列: [${fruits.join(', ')}]<br>
                    最初の要素: ${fruits[0]}<br>
                    配列の長さ: ${fruits.length}<br>
                    最後の要素: ${fruits[fruits.length - 1]}
                </div>
            `;
        }
        
        // オブジェクトの例
        function showObject() {
            let person = {
                name: "田中太郎",
                age: 25,
                city: "東京",
                hobbies: ["読書", "映画"]
            };
            
            document.getElementById('objectOutput').innerHTML = `
                <div class="output">
                    <strong>実行結果:</strong><br>
                    名前: ${person.name}<br>
                    年齢: ${person['age']}<br>
                    住所: ${person.city}<br>
                    趣味: ${person.hobbies.join(', ')}
                </div>
            `;
        }
        
        // 関数の例
        function greet(name) {
            return `こんにちは、${name}さん！`;
        }
        
        const add = (a, b) => a + b;
        
        function callFunction() {
            const name = document.getElementById('nameInput').value || "名無し";
            const greeting = greet(name);
            const sum = add(10, 20);
            
            document.getElementById('functionOutput').innerHTML = `
                <div class="output">
                    <strong>実行結果:</strong><br>
                    挨拶: ${greeting}<br>
                    計算結果: 10 + 20 = ${sum}
                </div>
            `;
        }
        
        // 条件分岐の例
        function checkScore() {
            const score = parseInt(document.getElementById('scoreInput').value) || 0;
            let message;
            let grade;
            
            if (score >= 90) {
                message = "優秀です！";
                grade = "A";
            } else if (score >= 70) {
                message = "良好です";
                grade = "B";
            } else if (score >= 60) {
                message = "合格です";
                grade = "C";
            } else {
                message = "頑張りましょう";
                grade = "D";
            }
            
            const result = score >= 60 ? "合格" : "不合格";
            
            document.getElementById('conditionOutput').innerHTML = `
                <div class="output">
                    <strong>実行結果:</strong><br>
                    点数: ${score}点<br>
                    評価: ${message}<br>
                    グレード: ${grade}<br>
                    判定: ${result}
                </div>
            `;
        }
        
        // ループの例
        function showLoop() {
            const count = parseInt(document.getElementById('loopCount').value) || 5;
            let forResult = "";
            let whileResult = "";
            
            // for文
            for (let i = 1; i <= count; i++) {
                forResult += `${i}回目 `;
            }
            
            // while文
            let i = 1;
            while (i <= count) {
                whileResult += `カウント${i} `;
                i++;
            }
            
            document.getElementById('loopOutput').innerHTML = `
                <div class="output">
                    <strong>実行結果:</strong><br>
                    for文: ${forResult}<br>
                    while文: ${whileResult}
                </div>
            `;
        }
        
        // イベント処理
        document.getElementById('eventButton').addEventListener('click', function() {
            document.getElementById('eventOutput').innerHTML = `
                <div class="output">
                    <strong>イベント発生!</strong><br>
                    addEventListenerでクリックイベントを検知しました
                </div>
            `;
        });
        
        function showMessage() {
            document.getElementById('eventOutput').innerHTML = `
                <div class="output">
                    <strong>onclick属性!</strong><br>
                    HTML要素のonclick属性で実行されました
                </div>
            `;
        }
    </script>
</body>
</html>