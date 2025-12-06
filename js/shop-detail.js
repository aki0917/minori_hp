// 店舗情報のデータ
const shopData = {
  nishinasuno: {
    name: '西那須野店',
    image: './assets/img/shop/ni1.jpg',
    address: '〒329-2745<br>栃木県那須塩原市三区町510-2',
    tel: '0287-36-7043',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    features: `
      <p>農家の店みのり西那須野店は、西那須野町（現在の那須塩原市）にみのり１号店としてオープンしました。</p>
      <p>国道4号線沿いにあり、アクセスしやすい場所にあります。小型店ですが、きめ細かい接客をモットーに地域密着型店舗づくりをしています。</p>
    `
  },
  ishibashi: {
    name: '石橋店',
    image: './assets/img/shop/isi1.jpg',
    address: '〒329-0431<br>栃木県下野市薬師寺祇園原3379-3',
    tel: '0285-44-3831',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    access: 'JR石橋駅より車で約5分',
    features: `
      <p>農家の店みのり石橋店は、下野市薬師寺祇園原の国道４号線沿いにあります。</p>
      <p>農業関連資材の品ぞろえの充実はもちろん、植物・ガーデン用品・家庭菜園向けの取り扱い商品を拡大し、農家さんからガーデナーまで多くのお客さまにご利用いただける店舗づくりを目指しています。</p>
    `
  },
  moka: {
    name: '真岡店',
    image: './assets/img/shop/mo1.jpg',
    address: '〒321-4304<br>栃木県真岡市東郷20-2',
    tel: '0285-83-9696',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    access: 'JR真岡駅より車で約8分',
    features: `
      <p>農家の店みのり真岡店は、真岡市東郷にあります。プロの農家の方から家庭菜園を楽しむ方まで、幅広いニーズに応える商品を取り揃えています。</p>
      <p>地域特産品のイチゴ関連商品資材の充実はもちろん、花苗、ガーデンの売り場を拡大し、品ぞろえが広がりました。一般のお客さまも大歓迎です。</p>
    `
  },
  ootawara: {
    name: '大田原店',
    image: './assets/img/shop/oo1.jpg',
    address: '〒324-0047<br>栃木県大田原市美原1-3138-2',
    tel: '0287-23-3335',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    access: 'JR大田原駅より車で約10分',
    features: `
      <p>農家の店みのり大田原店は、大田原市美原にあります。2024年よりファーム＆ガーデンストアとしてガーデン売り場を拡大しました。</p>
      <p>インドア植物、ガーデン資材、雑貨まで幅広く取り揃え、農家さんからガーデナーの方まで幅広いお客さまに喜んでいただける店舗づくりをしています。</p>
    `
  },
  ujiie: {
    name: '氏家店',
    image: './assets/img/shop/u1.jpg',
    address: '〒329-1312<br>栃木県さくら市桜野1141-2',
    tel: '028-681-1911',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    access: 'JR氏家駅より車で約5分',
    features: `
      <p>農家の店みのり氏家店は、栃木県さくら市櫻野にあります。水稲が盛んな地域の為、特に水稲関連資材の資材が充実しています。</p>
      <p>売り場にない商品なども店舗スタッフまでお気軽にお問い合わせください。お客さまのお手伝いをさせていただきます。</p>
    `
  },
  kanuma: {
    name: '鹿沼店',
    image: './assets/img/shop/ka1.jpg',
    address: '〒322-0015<br>栃木県鹿沼市上石川1457-1',
    tel: '0289-76-4445',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    access: 'JR鹿沼駅より車で約8分',
    features: `
      <p>農家の店みのり鹿沼店は、東北自動車道鹿沼インターの近くにあります。農家さんだけでなく、ガーデナーのお客さまが多いお店です。</p>
      <p>花苗から鉢花、多肉・観葉植物など植物をはじめ、ガーデン用品売り場が充実しており品ぞろえも豊富です。商品の入荷情報は随時インスタグラムで発信しています。</p>
    `
  },
  kyouwa: {
    name: '協和店',
    image: './assets/img/shop/kyo1.jpg',
    address: '〒309-1106<br>茨城県筑西市新治1996-123',
    tel: '0296-21-7788',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    access: 'JR下館駅より車で約15分',
    features: `
      <p>農家の店みのり協和店は、茨城県筑西市にあります。当店茨城県唯一の店舗となりますので、広範囲のお客さまよりご利用いただいております。</p>
      <p>売り場にない商品なども店舗スタッフまでお気軽にお問い合わせください。店舗スタッフが親身に対応させていただきます。</p>
    `
  },
  ichikai: {
    name: '市貝店',
    image: './assets/img/shop/iti1.jpg',
    address: '〒321-3426<br>栃木県芳賀郡市貝町赤羽3589-2',
    tel: '0285-67-4141',
    hours: '9:00 ～ 18:30<br>10月～2月：9:00 ～ 18:00までの営業となります。',
    access: 'JR真岡駅より車で約15分',
    features: `
      <p>農家の店みのり市貝店は、芳賀郡市貝町赤羽にあります。プロの農家の方から家庭菜園を楽しむ方まで、幅広いニーズに応える商品を取り揃えています。</p>
      <p>県内地域特産品のイチゴ関連商品資材も充実はもちろん、専門スタッフによる植物の販売を強化し、関連資材の品ぞろえもございます。</p>
    `
  },
  interpark: {
    name: 'みのり花木センター インターパーク店',
    image: './assets/img/shop/IP1.jpg',
    address: '〒321-0918<br>栃木県宇都宮市平塚町307-1',
    tel: '028-656-7193',
    hours: '9:00 ～ 18:00<br>10月～2月：9:00 ～ 17:30までの営業となります。',
    features: `
      <p>みのり花木センター インターパーク店は、栃木県宇都宮市にある大型ガーデンセンターです。</p>
      <p>花と観葉植物: 四季折々の花苗、鉢花に加え、サボテン、多肉、観葉植物や花木まで豊富に取り揃えています。</p>
      <p>ガーデニング用品、雑貨、園芸資材など品ぞろえは地域最大級です。</p>
      <p>直売所コーナーも併設しています。</p>
    `
  }
};

// 住所からGoogleマップの埋め込みURLを生成
function generateMapUrl(address) {
  // <br>タグを削除して住所のみを取得
  const cleanAddress = address.replace(/<br>/g, '').replace(/〒[\d-]+/g, '').trim();
  // URLエンコードしてGoogleマップURLを生成
  return `https://www.google.com/maps?q=${encodeURIComponent(cleanAddress)}&output=embed`;
}

// URLパラメータから店舗IDを取得
function getShopIdFromUrl() {
  const params = new URLSearchParams(window.location.search);
  return params.get('shop') || 'nishinasuno';
}

// 店舗情報を表示
function displayShopInfo() {
  const shopId = getShopIdFromUrl();
  const shop = shopData[shopId] || shopData.nishinasuno;
  
  // タイトルを更新
  document.title = `農家の店みのりFARM & GARDEN | ${shop.name}`;
  
  // 各要素を更新
  const shopNameEl = document.getElementById('shopName');
  const shopTitleEl = document.getElementById('shopTitle');
  const shopMainImageEl = document.getElementById('shopMainImage');
  const shopAddressEl = document.getElementById('shopAddress');
  const shopTelEl = document.getElementById('shopTel');
  const shopHoursEl = document.getElementById('shopHours');
  const shopAccessEl = document.getElementById('shopAccess');
  const shopMapEl = document.getElementById('shopMap');
  const shopFeaturesEl = document.getElementById('shopFeatures');
  
  if (shopNameEl) shopNameEl.textContent = shop.name;
  if (shopTitleEl) shopTitleEl.textContent = shop.name;
  if (shopMainImageEl) {
    shopMainImageEl.src = shop.image;
    shopMainImageEl.alt = shop.name;
  }
  if (shopAddressEl) shopAddressEl.innerHTML = shop.address;
  if (shopTelEl) {
    shopTelEl.textContent = shop.tel;
    shopTelEl.href = `tel:${shop.tel}`;
  }
  if (shopHoursEl) shopHoursEl.innerHTML = shop.hours;
  if (shopAccessEl) shopAccessEl.textContent = shop.access;
  if (shopMapEl) {
    // 住所からGoogleマップのURLを生成
    shopMapEl.src = generateMapUrl(shop.address);
  }
  if (shopFeaturesEl) shopFeaturesEl.innerHTML = shop.features;
}

// ページ読み込み時に実行
document.addEventListener('DOMContentLoaded', displayShopInfo);


