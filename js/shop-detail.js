// 店舗情報のデータ
const shopData = {
  nishinasuno: {
    name: '西那須野店',
    image: './assets/img/shop/ni1.jpg',
    address: '〒325-0062<br>栃木県那須塩原市高砂町1-1',
    tel: '0287-36-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR那須塩原駅より車で約10分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>西那須野店は、1992年4月にオープンしたみのりの第1号店です。<br>
      農業資材、農薬、肥料、機械など生産資材から、野菜・花の種や苗を扱う大型の専門店として、地域の農家さんをサポートしています。</p>
      <p>広々とした店内には、3万点以上の商品を取り揃えており、プロの農家さんから家庭菜園愛好家まで、幅広いお客様にご利用いただいています。</p>
    `
  },
  ishibashi: {
    name: '石橋店',
    image: './assets/img/shop/isi1.jpg',
    address: '〒329-0416<br>栃木県下野市石橋438',
    tel: '0285-44-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR石橋駅より車で約5分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>石橋店は、1995年2月にオープンしました。<br>
      下野市を中心とした地域の農家さんに愛される店舗として、日々お客様のサポートを行っています。</p>
    `
  },
  moka: {
    name: '真岡店',
    image: './assets/img/shop/mo1.jpg',
    address: '〒321-4301<br>栃木県真岡市台町1234',
    tel: '0285-81-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR真岡駅より車で約8分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>真岡店は、1998年2月にオープンしました。<br>
      真岡市周辺の農家さんをサポートしています。</p>
    `
  },
  ootawara: {
    name: '大田原店',
    image: './assets/img/shop/oo1.jpg',
    address: '〒324-0047<br>栃木県大田原市美原1-3138-2',
    tel: '0287-23-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR大田原駅より車で約10分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>大田原店は、1998年3月にオープンしました。<br>
      大田原市を中心とした地域の農家さんをサポートしています。</p>
    `
  },
  ujiie: {
    name: '氏家店',
    image: './assets/img/shop/u1.jpg',
    address: '〒329-1311<br>栃木県さくら市氏家1234',
    tel: '028-681-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR氏家駅より車で約5分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>氏家店は、1998年3月にオープンしました。<br>
      さくら市を中心とした地域の農家さんをサポートしています。</p>
    `
  },
  kanuma: {
    name: '鹿沼店',
    image: './assets/img/shop/ka1.jpg',
    address: '〒322-0061<br>栃木県鹿沼市上野町1234',
    tel: '0289-65-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR鹿沼駅より車で約8分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>鹿沼店は、1999年8月にオープンしました。<br>
      鹿沼市を中心とした地域の農家さんをサポートしています。</p>
    `
  },
  kyouwa: {
    name: '協和店',
    image: './assets/img/shop/kyo1.jpg',
    address: '〒308-0001<br>茨城県筑西市協和1234',
    tel: '0296-25-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR下館駅より車で約15分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>協和店は、2001年8月にオープンしました。<br>
      茨城県筑西市を中心とした地域の農家さんをサポートしています。</p>
    `
  },
  ichikai: {
    name: '市貝店',
    image: './assets/img/shop/iti1.jpg',
    address: '〒321-3421<br>栃木県芳賀郡市貝町1234',
    tel: '0289-92-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: 'JR真岡駅より車で約15分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>市貝店は、2002年4月にオープンしました。<br>
      市貝町を中心とした地域の農家さんをサポートしています。</p>
    `
  },
  interpark: {
    name: 'みのり花木センター インターパーク店',
    image: './assets/img/shop/IP1.jpg',
    address: '〒321-0964<br>栃木県宇都宮市インターパーク6-1-1',
    tel: '028-665-1111',
    hours: '平日：9:00 ～ 18:00<br>土曜日：9:00 ～ 17:00<br>日曜日・祝日：9:00 ～ 17:00',
    access: '東北自動車道 宇都宮ICより車で約5分',
    mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890',
    features: `
      <p>みのり花木センター インターパーク店は、2023年にオープンした最新店舗です。<br>
      インターパークの好立地に位置し、広々とした店内で快適にお買い物をお楽しみいただけます。</p>
    `
  }
};

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
  if (shopMapEl) shopMapEl.src = shop.mapUrl;
  if (shopFeaturesEl) shopFeaturesEl.innerHTML = shop.features;
}

// ページ読み込み時に実行
document.addEventListener('DOMContentLoaded', displayShopInfo);


