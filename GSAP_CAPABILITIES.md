# GSAPでできること - 完全ガイド

## 🎯 GSAPとは？

**GSAP (GreenSock Animation Platform)** は、プロフェッショナルなWebアニメーションを作成するための強力なJavaScriptライブラリです。

## ✨ このプロジェクトで既に使われている機能

### 1. **基本的なアニメーション**
```javascript
// フェードイン
gsap.to(element, {
  opacity: 1,
  duration: 0.6,
  ease: 'power2.out'
});

// スライド
gsap.to(element, {
  x: 0,        // 横移動
  y: 0,        // 縦移動
  duration: 0.8
});

// スケール（拡大縮小）
gsap.to(element, {
  scale: 1,
  duration: 0.5
});
```

### 2. **ScrollTrigger（スクロール連動アニメーション）**
```javascript
// スクロール位置に応じてアニメーション
ScrollTrigger.create({
  trigger: element,
  start: 'top 80%',
  onEnter: () => {
    // 要素が表示されたら実行
  }
});
```

### 3. **タイムライン（複数アニメーションの連続実行）**
```javascript
const tl = gsap.timeline();
tl.to(element1, { x: 100 })
  .to(element2, { y: 50 }, 0.2)  // 0.2秒後に開始
  .to(element3, { opacity: 1 });
```

---

## 🚀 GSAPでできること（全機能）

### 📐 **1. 位置・移動アニメーション**

#### 基本移動
```javascript
// X軸移動（横）
gsap.to(element, { x: 100 });

// Y軸移動（縦）
gsap.to(element, { y: -50 });

// 両方同時
gsap.to(element, { x: 100, y: 50 });
```

#### 回転
```javascript
// 2D回転
gsap.to(element, { rotation: 360 });

// 3D回転
gsap.to(element, { 
  rotationX: 90,  // X軸回転
  rotationY: 180, // Y軸回転
  rotationZ: 45   // Z軸回転
});
```

#### スケール（拡大縮小）
```javascript
gsap.to(element, { 
  scale: 1.5,        // 全体
  scaleX: 2,         // 横だけ
  scaleY: 0.5        // 縦だけ
});
```

---

### 🎨 **2. 見た目のアニメーション**

#### 色・透明度
```javascript
gsap.to(element, {
  opacity: 0.5,
  backgroundColor: '#ff0000',
  color: '#ffffff'
});
```

#### グラデーション
```javascript
gsap.to(element, {
  background: 'linear-gradient(45deg, #ff0000, #00ff00)'
});
```

#### フィルター効果
```javascript
gsap.to(element, {
  blur: 10,           // ぼかし
  brightness: 1.5,    // 明るさ
  contrast: 1.2,      // コントラスト
  grayscale: 1,       // グレースケール
  hueRotate: 180      // 色相回転
});
```

#### ボックスシャドウ
```javascript
gsap.to(element, {
  boxShadow: '0 10px 30px rgba(0,0,0,0.3)'
});
```

---

### 📝 **3. テキストアニメーション**

#### 文字ごとにアニメーション
```javascript
const text = element.textContent;
element.textContent = '';
text.split('').forEach((char, i) => {
  const span = document.createElement('span');
  span.textContent = char;
  element.appendChild(span);
  
  gsap.from(span, {
    opacity: 0,
    y: 20,
    duration: 0.3,
    delay: i * 0.05
  });
});
```

#### タイピングエフェクト
```javascript
const text = "こんにちは";
let index = 0;
function type() {
  element.textContent += text[index];
  index++;
  if (index < text.length) {
    setTimeout(type, 100);
  }
}
type();
```

---

### 🎭 **4. 高度なアニメーション**

#### パス（経路）に沿って移動
```javascript
const path = "M 100 100 Q 200 200 300 100";
gsap.to(element, {
  motionPath: {
    path: path,
    autoRotate: true
  },
  duration: 2
});
```

#### 物理演算（Physics2D）
```javascript
// 重力やバウンスなどの物理効果
gsap.to(element, {
  x: 500,
  y: 300,
  physics2D: {
    velocity: 200,
    angle: 45,
    gravity: 300
  }
});
```

#### モーフィング（形状変化）
```javascript
// SVGパスの形状を変化
gsap.to(pathElement, {
  morphSVG: "M 0 0 L 100 100",
  duration: 1
});
```

---

### 🎬 **5. タイムライン制御**

#### 順次実行
```javascript
const tl = gsap.timeline();
tl.to(element1, { x: 100 })
  .to(element2, { y: 50 })
  .to(element3, { opacity: 0 });
```

#### 同時実行
```javascript
const tl = gsap.timeline();
tl.to(element1, { x: 100 })
  .to(element2, { y: 50 }, 0); // 0 = 最初から同時
```

#### ラベルで制御
```javascript
const tl = gsap.timeline();
tl.to(element1, { x: 100 })
  .addLabel("start")
  .to(element2, { y: 50 })
  .to(element3, { opacity: 0 }, "start"); // "start"ラベルの位置から
```

---

### 📜 **6. ScrollTrigger（スクロール連動）**

#### 基本的な使い方
```javascript
gsap.to(element, {
  x: 500,
  scrollTrigger: {
    trigger: element,
    start: 'top center',  // トリガー位置
    end: 'bottom top',    // 終了位置
    scrub: true           // スクロールに連動
  }
});
```

#### ピン（固定）
```javascript
ScrollTrigger.create({
  trigger: element,
  start: 'top top',
  end: '+=1000',
  pin: true  // 要素を固定
});
```

#### プログレスバー
```javascript
gsap.to(progressBar, {
  width: '100%',
  scrollTrigger: {
    trigger: section,
    start: 'top top',
    end: 'bottom bottom',
    scrub: true
  }
});
```

---

### 🎯 **7. イージング（動きの緩急）**

#### 基本イージング
```javascript
// スムーズ
ease: 'power1.out'

// バウンス
ease: 'bounce.out'

// バック（少し戻る）
ease: 'back.out(1.7)'

// エラスティック（弾む）
ease: 'elastic.out(1, 0.5)'

// カスタム
ease: 'power2.inOut'
```

#### カスタムイージング
```javascript
gsap.to(element, {
  x: 500,
  ease: 'custom',
  customEase: 'M0,0 C0.5,0 0.5,1 1,1'
});
```

---

### 🎪 **8. 特殊効果**

#### パーティクル
```javascript
// 要素を複数に分割してアニメーション
gsap.utils.toArray('.particle').forEach((particle, i) => {
  gsap.to(particle, {
    x: Math.random() * 500,
    y: Math.random() * 500,
    delay: i * 0.1
  });
});
```

#### 波打つアニメーション
```javascript
gsap.utils.toArray('.wave-item').forEach((item, i) => {
  gsap.to(item, {
    y: -20,
    duration: 0.5,
    delay: i * 0.1,
    yoyo: true,
    repeat: -1,
    ease: 'sine.inOut'
  });
});
```

#### マスクアニメーション
```javascript
gsap.to(element, {
  clipPath: 'inset(0% 0% 0% 0%)',  // マスクを解除
  duration: 1
});
```

---

### 🔄 **9. 繰り返し・反転**

#### 繰り返し
```javascript
gsap.to(element, {
  rotation: 360,
  repeat: -1,        // 無限
  repeat: 3,         // 3回
  yoyo: true         // 往復
});
```

#### 遅延
```javascript
gsap.to(element, {
  x: 100,
  delay: 1,          // 1秒待つ
  repeatDelay: 0.5   // 繰り返しの間隔
});
```

---

### 🎛️ **10. 制御・操作**

#### 一時停止・再開
```javascript
const animation = gsap.to(element, { x: 100 });
animation.pause();   // 一時停止
animation.resume();  // 再開
animation.reverse(); // 逆再生
```

#### 進捗制御
```javascript
animation.progress(0.5);  // 50%の位置に
animation.time(1);        // 1秒の位置に
```

#### イベント
```javascript
gsap.to(element, {
  x: 100,
  onStart: () => console.log('開始'),
  onComplete: () => console.log('完了'),
  onUpdate: () => console.log('更新中')
});
```

---

## 💡 このプロジェクトで実装可能な例

### 企業理念テキストに適用できるアニメーション

1. **文字が順番に浮き上がる**
2. **グラデーションが流れる**
3. **3D回転しながら現れる**
4. **波打つように動く**
5. **光が流れる**
6. **タイピングエフェクト**
7. **散らばって集まる**
8. **フェードイン＋スケール**

---

## 🎨 実用例（このプロジェクトから）

### ヘッダーのフェードイン
```javascript
gsap.to(header, {
  opacity: 1,
  y: 0,
  duration: 0.6,
  ease: 'power2.out'
});
```

### 画像のマスクアニメーション
```javascript
gsap.to(image, {
  clipPath: 'inset(0% 0 0 0)',
  opacity: 1,
  y: 0,
  duration: 0.8
});
```

### スクロール連動アニメーション
```javascript
ScrollTrigger.create({
  trigger: section,
  start: 'top 80%',
  onEnter: () => {
    // アニメーション実行
  }
});
```

---

## 📚 参考リソース

- [GSAP公式ドキュメント](https://greensock.com/docs/)
- [GSAP CodePen例](https://codepen.io/collection/DYpWYq)
- [ScrollTriggerガイド](https://greensock.com/docs/v3/Plugins/ScrollTrigger)

---

## 🎯 まとめ

GSAPは以下のことができます：

✅ **あらゆるCSSプロパティのアニメーション**
✅ **スクロール連動アニメーション**
✅ **複雑なタイムライン制御**
✅ **物理演算・パスアニメーション**
✅ **高性能（60fps）**
✅ **ブラウザ互換性が高い**

**企業理念テキストには、上記の機能を組み合わせて、センスのあるアニメーションを作成できます！**

