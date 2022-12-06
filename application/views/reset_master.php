
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=site_url();?>/reset/css/style.css">
    <link rel="stylesheet" href="<?=site_url();?>/reset/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?=site_url();?>/reset/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?=site_url();?>/reset/css/styles.css">
    <title><?=$title;;?></title>

    <script nonce="798ba8e8-fd92-4bc4-8ab5-6f01eda905ce">(function(w,d){!function(cM,cN,cO,cP){cM.zarazData=cM.zarazData||{};cM.zarazData.executed=[];cM.zaraz={deferred:[],listeners:[]};cM.zaraz.q=[];cM.zaraz._f=function(cQ){return function(){var cR=Array.prototype.slice.call(arguments);cM.zaraz.q.push({m:cQ,a:cR})}};for(const cS of["track","set","debug"])cM.zaraz[cS]=cM.zaraz._f(cS);cM.zaraz.init=()=>{var cT=cN.getElementsByTagName(cP)[0],cU=cN.createElement(cP),cV=cN.getElementsByTagName("title")[0];cV&&(cM.zarazData.t=cN.getElementsByTagName("title")[0].text);cM.zarazData.x=Math.random();cM.zarazData.w=cM.screen.width;cM.zarazData.h=cM.screen.height;cM.zarazData.j=cM.innerHeight;cM.zarazData.e=cM.innerWidth;cM.zarazData.l=cM.location.href;cM.zarazData.r=cN.referrer;cM.zarazData.k=cM.screen.colorDepth;cM.zarazData.n=cN.characterSet;cM.zarazData.o=(new Date).getTimezoneOffset();if(cM.dataLayer)for(const cZ of Object.entries(Object.entries(dataLayer).reduce(((c_,da)=>({...c_[1],...da[1]})))))zaraz.set(cZ[0],cZ[1],{scope:"page"});cM.zarazData.q=[];for(;cM.zaraz.q.length;){const db=cM.zaraz.q.shift();cM.zarazData.q.push(db)}cU.defer=!0;for(const dc of[localStorage,sessionStorage])Object.keys(dc||{}).filter((de=>de.startsWith("_zaraz_"))).forEach((dd=>{try{cM.zarazData["z_"+dd.slice(7)]=JSON.parse(dc.getItem(dd))}catch{cM.zarazData["z_"+dd.slice(7)]=dc.getItem(dd)}}));cU.referrerPolicy="origin";cU.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(cM.zarazData)));cT.parentNode.insertBefore(cU,cT)};["complete","interactive"].includes(cN.readyState)?zaraz.init():cM.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body>
<div class="d-md-flex half">
  <div class="bg" style="background-image: url('reset/img/portal.jpg');"></div>
    <div class="contents">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto" style="margin-top:-7rem;margin-bottom:-4rem;">
              <div class="text-center mb-5">
                <h5>Reset Akun <strong>Sisy Cloud</strong></h5>
                <p><small>Masukkan password baru anda</small></p>
              </div>
              <?php if ($cari == null) { ?>

                <h5 class="text-danger" style="font-size:20px;"><i class="fa fa-times"></i> Maaf Data Anda Tidak Ditemukan.</h5>

                <div class="form-group text-center mt-4">
                      <a href='<?=site_url('/');?>' style='text-decoration:none;'> <i class="fas fa-fw fa-share"></i> 
                      <input type="submit" value="Kembali" class="btn btn-block btn-danger">
                      </a>
                  </div>
              <?php } ?>
              <?php foreach($cari as $data): ?>
              <form method="post" action="<?=site_url('reset-akun')?>">
                <div class="form-group first" style="margin-top:-2rem;">
                  <input type="hidden" name="id_admin" class="form-control" value="<?=$data->id_admin; ?>" >
                </div>

                <div class="form-group first">
                  <input type="hidden" name="email" class="form-control" value="<?=$data->email; ?>" >
                </div>

                <div class="form-group last mb-3">
                  <input type="hidden" name="fullname" class="form-control" value="<?=$data->fullname; ?>">
                </div>

                <div class="form-group first">
                  <label for="username">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="ex. **********">
                </div>

                <div class="form-group first">
                  <label for="username">Ulangi Password</label>
                  <input type="password" name="password2" class="form-control" placeholder="ex. **********" >
                </div>

                <input type="submit" name="submit" value="Ubah Password" class="btn btn-block btn-info">
                </form>

                <div class="text-center mt-4">
                <a href='<?=site_url('/');?>' style='text-decoration:none;float:center;'> <i class="fas fa-fw fa-share"></i> 
                <input type="submit" value="Batal" class="btn btn-sm  btn-danger">
                </a>
                </div>

                <div class="text-center mt-4">
                <a href="https://notfound.id" style="text-decoration:none;">Notfound Indonesia</a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?=site_url();?>/reset/js/jquery-3.3.1.min.js"></script>
  <script src="<?=site_url();?>/reset/js/popper.min.js"></script>
  <script src="<?=site_url();?>/reset/js/bootstrap.min.js"></script>
  <script src="<?=site_url();?>/reset/js/main.js"></script>

  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"775252da9a467be0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>
</html>