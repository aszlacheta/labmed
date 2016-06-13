@extends('layouts.master')
@section('content')
<html>
   <head>
      <script language="javascript" type="text/javascript">
         function roundto(f,n){
           nn=Math.pow(10,n)
           return (Math.round(f*nn)/nn);
         }; 
         function liczStezenia(){
           F=document.stezForm;
           if (isNaN(F.d.value) || isNaN(F.M.value)){
             alert ("Musisz podać gęstość i masę molową");
           }else{
           if ((F.cn.value!= '') && !isNaN(F.cn.value)){
             F.cp.value=F.cn.value*100*F.M.value/F.d.value/1000;
           }else if (!isNaN(F.cp.value)){
             F.cn.value=F.cp.value*F.d.value/(100*F.M.value)*1000;
           }else{
             alert("Podaj jedno stężenie");
           };
           };
         };
         
      </script>
      <script name="javascript" type="text/javascript">
         NEW=1;  EMPTY=2; OK=3; ERR=4; BRACE=5; CHAR=6; NOSYMB=7; MASS=8;
         
         /*--------------------------------------------------------*/
         errTab=new Array(
         "0",
         "Jeszcze nie zinterpretowany wzór",
         "Nie podano żadnego wzoru?",
         "OK",
         "ERR",
         "Błąd w sparowaniu nawiasów",
         "Nieznany znak",
         "Nieznany symbol pierwiastka",
         "Błąd podczas obliczania masy molowej");
         /*--------------------------------------------------------*/
         var status=NEW;
         var errpos;
         var i;
         UOPm =new Array("0.000000","1.007939","4.002600","6.940998","9.012180","10.810990","12.011000","14.006700","15.999400","18.998400","20.179700","22.989770","24.305000","26.015400","28.085500","30.973800","32.066000","35.452700","39.948000","39.098290","40.078000","44.955900","47.880000","50.941500","51.996100","54.938000","55.847000","58.933300","58.690000","63.546000","65.390000","69.723000","72.610000","74.921600","79.960000","79.904000","83.800000","85.467790","87.620000","89.905800","91.224000","92.963800","95.940000","97.905000","101.070000","102.905000","106.420000","107.868000","112.411000","114.820000","118.710000","121.750000","127.600000","126.904500","131.290000","132.905400","137.327000","138.905500","140.115000","140.908000","144.240000","144.913000","150.360000","151.965000","157.250000","158.925000","162.500000","164.930000","167.260000","168.934000","173.040000","174.967000","178.490000","180.948000","183.850000","186.207000","190.200000","192.220000","195.080000","196.967000","200.590000","204.383000","207.200000","208.980000","208.982000","209.987000","222.018000","223.020000","226.025000","227.028000","232.038000","231.036000","238.029000","237.048000","244.064000","243.061000","247.070000","247.070000","251.080000","252.080000","257.095000","258.099000","259.100000","260.100000","261.100000");
         UOPs= new Array("Zz","H","He","Li","Be","B","C","N","O","F","Ne","Na","Mg","Al","Si","P","S","Cl","Ar","K","Ca","Sc","Ti","V","Cr","Mn","Fe","Co","Ni","Cu","Zn","Ga","Ge","As","Se","Br","Kr","Rb","Sr","Y","Zr","Nb","Mo","Tc","Ru","Rh","Pd","Ag","Cd","In","Sn","Sb","Te","I","Xe","Cs","Ba","La","Ce","Pr","Nd","Pm","Sm","Eu","Gd","Tb","Dy","Ho","Er","Tm","Yb","Lu","Hf","Ta","W","Re","Os","Ir","Pt","Au","Hg","Tl","Pb","Bi","Po","At","Rn","Fr","Ra","Ac","Th","Pa","U","Np","Pu","Am","Cm","Bk","Cf","Es","Fm","Md","No","Lr","Ku");
         proste_atm = new Array;
         proste_ile_atm = new Array;
         var ile_prostych=0;
         pary= new Array;
         pary['(']=')';
         pary['{']='}';
         pary['[']=']';
         pary['<']='>';
         
         function UOPsSearch(s){
         la=0;
         while ((UOPs[la++] != s) && la<UOPs.length){}
         if (la>=UOPs.length){
           return false;
         }else{
         return la-1;
         };
         };
         
         /*--------------------------------------------------------*/
         function isdigit(l){
         cyfry=/[0-9]/;
         if (cyfry.test(l)){
          return  true;
         }else{
          return false;
         };
         
         };
         
         function numb(l){
         w=0;
         if (i< formula.length){
         while(isdigit(formula[i]) && (i<=formula.length)){
           w=w*10+(eval(formula[i]));
          i++;
         };
         };
         if (w==0) w=1;
         return w;
         };
         
         function isupper(a){
         duzeLitery=/[A-Z]/;
         if (duzeLitery.test(a)){
         return true;
         }else{
          return false;
         };
         };
         function islower(a){
         duzeLitery=/[a-z]/;
         if (duzeLitery.test(a)){
         return true;
         }else{
          return false;
         };
         };
         
         /*--------------------------------------------------------*/
         function tlumacz(frm){
         errpos=null;
         formula=new String;
         formula=frm;
          ile_prostych=0;
           nawiasyOtwierajace=/\(|\{|\[|\</;
           nawiasyZamykajace=/\)|\}|\]|\>/;
           duzeLitery=/[A-Z]/;
           maleLitery=/[a-z]/;
            var tmp,j;
            i=0;
           ile_stos=0;
           atsymb=new Array;
           ns=new Object;   
           ns.nwy = new Array;
           ns.gdzie = new Array;
           ns.licznik=0;
            var nw;
            pre=numb(i);
          if (status==NEW){
            status=OK;
         
            while(i<formula.length){
             if (nawiasyOtwierajace.test(formula[i]) ){
              ns.nwy[ns.licznik]=formula[i];
              ns.gdzie[ns.licznik]=ile_prostych;
              ns.licznik++;
              i++;
             }else if(nawiasyZamykajace.test(formula[i])){
              if (pary[ns.nwy[ns.licznik-1]] != formula[i]){
                status=BRACE;
                errpos=i;
                return 1;
              }; 
              i++; 
               zanawiasem=numb(i);
              for(j=ns.gdzie[ns.licznik-1];j<ile_prostych;j++){
               proste_ile_atm[j]*=zanawiasem;
              };
              ns.licznik--;
             }else if (isupper(formula[i])){ 
              atsymb=new String;
              atsymb=formula[i++];
              if ((i<formula.length) && (islower(formula[i]))){
               atsymb+=formula[i++];
              }else{
              };
              tmp=UOPsSearch(atsymb);
              if (tmp){
                proste_atm[ile_prostych]=tmp;
                proste_ile_atm[ile_prostych++]=numb(i)*pre;
              }else{
                 status=NOSYMB;
                 errpos=i-atsymb.length;
                 return 1;
              };
             }else if (formula[i]=='*'){
         i++;
               pre=numb(i);
             }else{
               status=CHAR;
               errpos=i; 
               return 1;
             };
            };
            if (ns.licznik != 0){
             status=BRACE;
             errpos=i;
             return 1;
            };
          };
         return 0;
         };
         
         /*--------------------------------------------------------*/
         function masa_mol(){
         var i;
         var  masa=0.0;
         if (status==OK){
              for(i=0; i<ile_prostych; i++){
                masa+=UOPm[proste_atm[i]]*proste_ile_atm[i];
              };
              return masa;
         };
         return -1.0;
         };  
         
         function pos(){
         if (status>=0)
         return status;
         };
         
         function test1(){
         id=UOPsSearch(document.kmmTest.symbol.value)
         document.kmmTest.masam.value=UOPm[id];
         };
         
         //-------------------------------------------------------------------------
         function skladProcent(){
         var i;
         masa=masa_mol();
         sklad ="";
         if (status==OK){
              for(i=0; i<ile_prostych; i++){
                sklad+=UOPs[proste_atm[i]] +": " + Math.round(UOPm[proste_atm[i]]*proste_ile_atm[i]/masa*100*100)/100 + "%\n";
              };
              return sklad;
         };
         return "";
         
         };
         
         
         function main(){
         status=NEW;
         tlumacz(document.kmmForm.wzor.value);  
         document.kmmForm.masam.value=masa_mol();
         if (status != OK){ 
         alert (errTab[status]  + "\nPozycja błędu: " + (++errpos))
         }else{
          document.kmmForm.sklad.value=skladProcent();
         };
         };
      </script>
      <script language="JavaScript" type="text/javascript">
         function liczProporcje(){
         F=document.proporcja;
         l = new Array;
         l[0]=F.a.value;l[1]=F.b.value;l[2]=F.c.value;l[3]=F.d.value;
           yix=/^\s*X|x\s*$/;
           jestx=false; nieliczba=false;
         for (i=0;i<4;i++){
           if (isNaN(l[i])){
             if ((! jestx) &&  (yix.test(l[i])==true)){
               g1=(i+2) % 4;
               g2=3-g1;
               d=(g2+2) % 4;
               xi=i;
               jestx=true
             }else{
               nieliczba=true;
             };
           };
         };
           if (!jestx){
            alert("musisz wpisac w ktores pole 'x'");
           }else{ 
             if ( nieliczba) {
               alert("w trzech polach musza byc liczby");
             }else{
             l[xi]=l[g1]*l[g2]/l[d];
             F.t.value="     " + l[g1] +" * " + l[g2]+"\nx = ------- = " +  l[xi] + "\n       " + l[d];
             F.a.value=l[0];F.b.value=l[1];F.c.value=l[2];F.d.value=l[3];
            };
           };
         return 0;
         };
      </script>
   </head>
   
   
   <body>
      <div>
         <h1>Przeliczanie stężeń</h1>
         <p>Przelicza stężenie procentowe na molowe i na odwrót.</p>
         <form name="stezForm" id="stezForm">
            <table align="center" width="600" cellspacing="0" cellpadding="2" >
               <tr>
                  <td>stężenie procentowe</td>
                  <td> <input type="text" name="cp" size="6" value="10" /> %</td>
                  <td></td>
                  <td class="opisPrawo">gęstość roztworu</td>
                  <td> <input type="text" name="d" size="6" value= "1.2" /> g/cm<sup>3</sup></td>
               </tr>
               <tr>
                  <td class="opisPrawo">masa molowa</td>
                  <td> <input type="text" name="M" size="6" value="50" /> g/mol</td>
                  <td></td>
                  <td class="opisPrawo">stężenie molowe </td>
                  <td><input type="text" name="cn" size="6" />
                     mol/dm<sup>3</sup>
                  </td>
               </tr>
               <tr>
                  <td class="tdCenter" colspan="5">
                     <input type="button" name="oblicz" value="Oblicz" onclick="liczStezenia()"
                        class="exebut"/>
                     <input type="reset" name="czysc" value="Wyczyść"  class="wyczysc"/>
                  </td>
               </tr>
            </table>
         </form>
      </div>
      <div>
         <h1>Kalkulator mas molowych</h1>
         <p>
            Oblicza masy molowe ze wzoru sumarycznego.
         </p>
         <p>
            W pole "wzór sumaryczny" wpisz po prostu wzór sumaryczny związku chemicznego
            i wciśnij przycisk "Oblicz", a program obliczy masę molową tego związku.
            Wzory mogą zawierać nawiasy np: K4[Fe(CN)6], gwiazdkę na oznaczenie wody
            krystalizacyjnej np: CuSO4*5H2O. Inne przykłady: Na2SO4, C2H5OH, AlCl3.
         </p>
         <p>Dodatkowo program oblicza ułamki wagowe poszczególnych pierwiastków w 
            danej substancji.
         </p>
         <p>&nbsp; </p>
         <form name="kmmForm">
            <table align="center">
               <tbody>
                  <tr>
                     <td>wzór sumaryczny</td>
                     <td> <input name="wzor" size="20" type="text" /></td>
                  </tr>
                  <tr>
                     <td colspan="2" align="center">
                        <input name="przycisk" value="Oblicz" onclick="main()" type="button" />
                        <input name="reset1" value="Wyczyść" type="reset" />
                     </td>
                  </tr>
                  <tr>
                     <td>masa molowa</td>
                     <td><input name="masam" size="20" type="text" /> g/mol</td>
                  </tr>
                  <tr>
                     <td>skład (% wag.)</td>
                     <td><textarea name="sklad" cols="20" rows="5"></textarea></td>
                  </tr>
               </tbody>
            </table>
         </form>
      </div>
      <div>
         <h1>Proporcja</h1>
         Wpisz w trzy dowolne pola  wartosci liczbowe, a do czwartego znak 'x'.
         <form name="proporcja">
            <table align="center">
               <tr>
                  <td><input type="text" name="a" size="10"></td>
                  <td><input type="text" name="b" size="10"></td>
               </tr>
               <tr>
                  <td><input type="text" name="c" size="10"></td>
                  <td><input type="text" name="d" size="10"></td>
               </tr>
               <tr>
                  <td colspan=2 align=center>
                     <input type="button" name="przycisk" class="exebut"
                        value=Oblicz onClick="liczProporcje()">
                     <input type="reset" name="czysc" value="Wyczyść"/>
                  </td>
               </tr>
               <tr>
                  <td colspan=2 align=center>
                     <textarea rows=3 cols=20 name=t></textarea>
                  </td>
               </tr>
            </table>
         </form>
         <div class="op">
            Przykład propocji: 
            <pre>
 a     x
--- = ---
 b     c

     a * c
x = -------
       b
</pre>
         </div>
      </div>
   </body>
</html>
@stop