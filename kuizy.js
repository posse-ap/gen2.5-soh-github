

//クイズ画像
let quizImage = [
  'https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png',
  'https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png',
  'https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png'
];

//問題文など
let quizSet = [
  {p:'1.この地名はなんて読む？', c:['たかなわ','こうわ','たかわ']},
  {p:'2.この地名はなんて読む？', c:['かめいど','かめど','かめと']},
  {p:'3.この地名はなんて読む？', c:['こうじまち','おかとまち','かゆまち']}
];
//選択肢のid格納先のリスト
let optionId = [
  [],[],[]
];



//クイズセクション生成
for(let i = 0; i < quizSet.length; i++){
  //各要素の取得、生成
  const main = document.getElementById('main');       //sectionの親要素の取得
  const section = document.createElement('section');
  const  h2= document.createElement('h2');
  const div = document.createElement('div');
  const img = document.createElement('img');
  const ul = document.createElement('ul');

  //クラスの追加など
  section.classList.add('box-container');
  h2.textContent = quizSet[i].p;
  div.classList.add('image-container');
  img.src = quizImage[i];
  
  //要素の配置
  main.appendChild(section);
  section.appendChild(h2);
  section.appendChild(div);
  section.appendChild(ul);
  div.appendChild(img);

  //正誤判定で使用
  ul.id = 'option' + i;

  //選択肢生成
  quizSet[i].c.forEach(function(j,index){
    const li = document.createElement('li');
    li.textContent = j;
    li.id = i + '-' + index;
    //idを配列に格納
    optionId[i][optionId[i].length] = li.id;
    //選択肢を配置
    ul.appendChild(li);
  })

  //選択肢の並び替え
  //選択肢を一つ選んで最後尾に並び替え、を2回
  for(j = 3; j > 1; j--){
    let randomNum = Math.floor(Math.random()*j);
    ul.appendChild(document.getElementById(i + '-' + randomNum));
  }

}

//選択肢をクリックして、色変更、解答表示
for (let i = 0; i < quizSet.length; i++){
  //各要素の取得
  let correct = document.getElementById(i + '-0');
  let false1 = document.getElementById(i + '-1');
  let false2 = document.getElementById(i + '-2');
  let options = document.getElementById('option' + i);
  
  //正解が押された時
  correct.onclick = function(){
    //色変更と選択不可にする
    correct.classList.add('correct');
    false1.className = ('click-none');
    false2.className = ('click-none');
    correct.classList.add('click-none');


    //解答boxの表示
    const answer = document.createElement('div');
    const answerTitle = document.createElement('p');
    const answerContent = document.createElement('p');

    answerTitle.innerText = '正解！';
    answerContent.innerText = '正解は「' + quizSet[i].c[0] + '」です！';

    answer.classList.add('answer-box');
    answerContent.classList.add('no-margin');
    answerTitle.classList.add('answer');

    options.appendChild(answer);
    answer.appendChild(answerTitle);
    answer.appendChild(answerContent);
  }
  //不正解１が押された時
  false1.onclick = function(){
    //色変更と選択不可にする
    false1.classList.add('false1');
    correct.classList.add('correct');
    false2.className = ('click-none');
    correct.classList.add('click-none');
    false1.classList.add('click-none');


    //解答boxの表示
    const answer = document.createElement('div');
    const answerTitle = document.createElement('p');
    const answerContent = document.createElement('p');
    answerTitle.innerText = '不正解！';
    answerContent.innerText = '正解は「' + quizSet[i].c[0] + '」です！';

    answer.classList.add('answer-box');
    answerContent.classList.add('no-margin');
    answerTitle.classList.add('false');
    options.appendChild(answer);
    answer.appendChild(answerTitle);
    answer.appendChild(answerContent);
  }
  //不正解２が押された時
  false2.onclick = function(){
    //色変更と選択不可にする
    false2.classList.add('false2');
    correct.classList.add('correct');
    correct.classList.add('click-none');
    false1.className = ('click-none');
    false2.classList.add('click-none');


    //解答boxの表示
    const answer = document.createElement('div');
    const answerTitle = document.createElement('p');
    const answerContent = document.createElement('p');
    answerTitle.innerText = '不正解！';
    answerContent.innerText = '正解は「' + quizSet[i].c[0] + '」です！';

    answer.classList.add('answer-box');
    answerContent.classList.add('no-margin');
    answerTitle.classList.add('false');
    options.appendChild(answer);
    answer.appendChild(answerTitle);
    answer.appendChild(answerContent);
  }
}
