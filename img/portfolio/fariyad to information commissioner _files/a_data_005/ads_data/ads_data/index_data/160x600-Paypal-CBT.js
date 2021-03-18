// JavaScript Document
//HTML5 Ad Template for PayPal :: Nick Denton


dcrmInit = function(){
	//---IMAGES AND BACKGROUNDS---
	BG01Image = document.getElementById('BG01Image');
	// Add this if there are 2 'flat' BG Colours, Add more in HTML and here if needed --- BG02Image = document.getElementById('BG02Image');

	textBG01 = document.getElementById('textBG01');
	textBG02 = document.getElementById('textBG02');
	textBGCover = document.getElementById('textBGCover');

	//---FRAME TEXTS---
	//Add or Remove the below depending on ammount of Frames or ammount of copy on Frames
	TextF0101 = document.getElementById('TextF0101');
	TextF0102 = document.getElementById('TextF0102');
	TextF0103 = document.getElementById('TextF0103');
	TextF0104 = document.getElementById('TextF0104');
	TextF0105 = document.getElementById('TextF0105');

	TextF0201 = document.getElementById('TextF0201');
	TextF0202 = document.getElementById('TextF0202');
	TextF0203 = document.getElementById('TextF0203');
	TextF0204 = document.getElementById('TextF0204');
	TextF0205 = document.getElementById('TextF0205');

	TextF0301 = document.getElementById('TextF0301');
	TextF0302 = document.getElementById('TextF0302');
	TextF0303 = document.getElementById('TextF0303');

	TextF0401 = document.getElementById('TextF0401');
	TextF0402 = document.getElementById('TextF0402');


	//---OTHER ASSETS---
	CornerLeftF01 = document.getElementById('CornerLeftF01');
	CornerRightF01 = document.getElementById('CornerRightF01');
	CornerLeftF02 = document.getElementById('CornerLeftF02');
	CornerRightF02 = document.getElementById('CornerRightF02');
	CornerLeftF03 = document.getElementById('CornerLeftF03');
	CornerRightF03 = document.getElementById('CornerRightF03');
	CornerLeftF04 = document.getElementById('CornerLeftF04');
	CornerRightF04 = document.getElementById('CornerRightF04');

	OverlaySlideF0101 = document.getElementById('OverlaySlideF0101');
	OverlaySlideF0102 = document.getElementById('OverlaySlideF0102');
	OverlaySlideF0201 = document.getElementById('OverlaySlideF0201');
	OverlaySlideF0202 = document.getElementById('OverlaySlideF0202');
	OverlaySlideF0301 = document.getElementById('OverlaySlideF0301');
	OverlaySlideF0302 = document.getElementById('OverlaySlideF0302');
	OverlaySlideF0401 = document.getElementById('OverlaySlideF0401');
	OverlaySlideF0402 = document.getElementById('OverlaySlideF0402');

	ColourL01 = document.getElementById('ColourL01');
	ColourSF0101 = document.getElementById('ColourSF0101');
	ColourR01 = document.getElementById('ColourR01');
	ColourSF0102 = document.getElementById('ColourSF0102');

	ColourL02 = document.getElementById('ColourL02');
	ColourSF0201 = document.getElementById('ColourSF0201');
	ColourR02 = document.getElementById('ColourR02');
	ColourSF0202 = document.getElementById('ColourSF0202');

	ColourL03 = document.getElementById('ColourL03');
	ColourSF0301 = document.getElementById('ColourSF0301');
	ColourR03 = document.getElementById('ColourR03');
	ColourSF0302 = document.getElementById('ColourSF0302');

	ColourL04 = document.getElementById('ColourL04');
	ColourSF0401 = document.getElementById('ColourSF0401');
	ColourR04 = document.getElementById('ColourR04');
	ColourSF0402 = document.getElementById('ColourSF0402');


	exitbtn = document.getElementById('exitbtn');
	LogoPayPal = document.getElementById('LogoPayPal');
	//Logobrand = document.getElementById('Logobrand');
	CTA = document.getElementById('CTA');
	repeat = document.getElementById('repeat');
	// Added Listeners for buttons
	addListeners();
}
	
	// --SET STARTING OPACITIES & VARIABLES--
	//Add Variables (Update colours/Copy/Easing here!!!)
	var Ease01 = "Back.easeOut";
	var Ease02 = "Sine.easeOut";
	var Pause2 = ".75"
	var Pause3 = "1.5"

	//Main 'Swipes' Colours for each frame
	var swipeColourF0101 = "#ec0868"; //-- Start Colour - Frame 01
	var swipeColourF0102 = "#019be3"; //-- 2nd Colour - Frame 01

	var swipeColourF0201 = "#ec0868"; //-- Start Colour - Frame 02
	var swipeColourF0202 = "#019be3"; //-- 2nd Colour - Frame 02

	var swipeColourF0301 = "#ec0868"; //-- Start Colour - Frame 03
	var swipeColourF0302 = "#019be3"; //-- 2nd Colour - Frame 03

	var swipeColourF0401 = "#ec0868"; //-- Start Colour - Frame 04
	var swipeColourF0402 = "#019be3"; //-- 2nd Colour - Frame 04

	//Corner Colours [Gradients] (Left Corners)
	var CornerColourL01G01 = "rgba(236, 8, 104,1)"; //-- Left, Frame 01 - Grad Colour 01
	var CornerColourL01G02 = "rgba(236, 8, 104,1)"; //-- Left, Frame 01 - Grad Colour 02

	var CornerColourL02G01 = "rgba(236, 8, 104,1)"; //-- Left, Frame 02 - Grad Colour 01
	var CornerColourL02G02 = "rgba(236, 8, 104,1)"; //-- Left, Frame 02 - Grad Colour 02

	var CornerColourL03G01 = "rgba(236, 8, 104,1)"; //-- Left, Frame 03 - Grad Colour 01
	var CornerColourL03G02 = "rgba(236, 8, 104,1)"; //-- Left, Frame 03 - Grad Colour 02

	var CornerColourL04G01 = "rgba(236, 8, 104,1)"; //-- Left, Frame 04 - Grad Colour 01
	var CornerColourL04G02 = "rgba(236, 8, 104,1)"; //-- Left, Frame 04 - Grad Colour 02
	
	//Corner Colours [Flat] (Right Corners)
	var CornerColourR01 = "#019be3"; //-- Right, Frame 01
	var CornerColourR02 = "#019be3"; //-- Right, Frame 02
	var CornerColourR03 = "#019be3"; //-- Right, Frame 03
	var CornerColourR04 = "#019be3"; //-- Right, Frame 04

	//CTA Colours & Copy
	var CTAText = ""; //--CTA Copy
	var CTACol01 = "";  //-- Start Colour
	var CTACol02 = "";  //-- Hover Colour

	//Disclaimer & Other Variables
	var TextAdjust = "0"; //--Adjust Text Position if needed
	
	//---SETTING UP EVERYTHING BEFORE ANIMATIONS---
	//Add all Main Text elements to this to be able to hide all at start
	var AllFrames = [TextF0101,TextF0102,TextF0103,TextF0104,TextF0105,TextF0201,TextF0202,TextF0203,TextF0204,TextF0205,TextF0301,TextF0302,TextF0303,TextF0401,TextF0402];
	
	TweenLite.to(AllFrames,0,{x:-600});
	//TweenLite.to(Logobrand,0,{x:300});
	TweenLite.to(CTA,0,{x:165});
	TweenLite.to(TC,0,{x:300});
	TweenLite.to(repeat,0,{x:150});
	TweenLite.to(BG01Image,0,{x:-100});
	TweenLite.to(textBG01,0,{x:0});
	TweenLite.to(textBGCover,0,{x:0});
	TweenLite.to(LogoPayPal,0,{x:235});

	//textBG01.style.opacity ="0";
	textBG02.style.opacity ="0";

	//Setup  using the Vars
	CTA.style.background = CTACol01;

	ColourSF0101.style.backgroundColor = swipeColourF0101;
	ColourR01.style.backgroundColor = CornerColourR01;
	ColourSF0102.style.background = swipeColourF0102;

	//ColourL02.style.background = CornerColourL02;
	ColourSF0201.style.backgroundColor = swipeColourF0201;
	ColourR02.style.backgroundColor = CornerColourR02;
	ColourSF0202.style.background = swipeColourF0202;

	//ColourL03.style.background = CornerColourL03;
	ColourSF0301.style.backgroundColor = swipeColourF0301;
	ColourR03.style.backgroundColor = CornerColourR03;
	ColourSF0302.style.background = swipeColourF0302;

	//ColourL04.style.background = CornerColourL04;
	ColourSF0401.style.backgroundColor = swipeColourF0401;
	ColourR04.style.backgroundColor = CornerColourR04;
	ColourSF0402.style.background = swipeColourF0402;

	function LeftGrad01(){
		var Original = "linear-gradient(to bottom, rgba(225,12,91,1) 0%,rgba(250,127,15,1) 43%);";
        var Part101 = "linear-gradient(to bottom,"
        var Part201 =  " 0%,"
		var Part301 = " 43%)"
        var ColTop01 = CornerColourL01G01;
        var ColBot01 = CornerColourL01G02;

        varBuild01 = Part101+ColTop01+Part201+ColBot01+Part301;
        TweenLite.to(ColourL01, 0, {backgroundImage:varBuild01});
	}

	function LeftGrad02(){
        var Part102 = "linear-gradient(to bottom,"
        var Part202 =  " 0%,"
		var Part302 = " 43%)"
        var ColTop02 = CornerColourL02G01;
        var ColBot02 = CornerColourL02G02;

        varBuild02 = Part102+ColTop02+Part202+ColBot02+Part302;
		TweenLite.to(ColourL02, 0, {backgroundImage:varBuild02});
	}

	function LeftGrad03(){
        var Part103 = "linear-gradient(to bottom,"
        var Part203 =  " 0%,"
		var Part303 = " 43%)"
        var ColTop03 = CornerColourL03G01;
        var ColBot03 = CornerColourL03G02;

        varBuild03 = Part103+ColTop03+Part203+ColBot03+Part303;
		TweenLite.to(ColourL03, 0, {backgroundImage:varBuild03});
	}

	function LeftGrad04(){
        var Part104 = "linear-gradient(to bottom,"
        var Part204 =  " 0%,"
		var Part304 = " 43%)"
        var ColTop04 = CornerColourL04G01;
        var ColBot04 = CornerColourL04G02;

        varBuild04 = Part104+ColTop04+Part204+ColBot04+Part304;
		TweenLite.to(ColourL04, 0, {backgroundImage:varBuild04});
	}

	function setGradients(){
		LeftGrad01();
		LeftGrad02();
		LeftGrad03();
		LeftGrad04();
	}

	setGradients();
	CTA.innerHTML = CTAText;


	// ---ANIMATIONS---

	// F01 (Initial Setup Frame)
	frameStart = function (){
		TweenLite.to(CornerLeftF01,0,{x:0});
		TweenLite.to(CornerRightF01,0,{x:+30});

		TweenLite.to(OverlaySlideF0101,0,{x:0});
		TweenLite.to(OverlaySlideF0102,0,{x:0});
		TweenLite.to(OverlaySlideF0201,0,{x:800});
		TweenLite.to(OverlaySlideF0202,0,{x:800});
		TweenLite.to(OverlaySlideF0301,0,{x:800});
		TweenLite.to(OverlaySlideF0302,0,{x:800});
		TweenLite.to(OverlaySlideF0401,0,{x:800});
		TweenLite.to(OverlaySlideF0402,0,{x:800});

		TweenLite.to(CornerLeftF02,0,{x:-350});
		TweenLite.to(CornerRightF02,0,{x:40});
		TweenLite.to(CornerLeftF03,0,{x:-350});
		TweenLite.to(CornerRightF03,0,{x:40});
		TweenLite.to(CornerLeftF04,0,{x:-350});
		TweenLite.to(CornerRightF04,0,{x:40});

		TweenLite.to(textBG01,0,{opacity:0});
		TweenLite.to(textBG02,0,{opacity:0});
		TweenLite.to(BG01Image,0,{x:+20, onComplete:frame02});	
	}

	// F02 (Main Animations start here )
	frame02 = function (){
		TweenLite.to(OverlaySlideF0101,.4,{x:-1500, ease:Sine.easeOut, delay:.1});
		TweenLite.to(OverlaySlideF0102,.5,{x:-1300, ease:Sine.easeOut, delay:.3});
		TweenLite.to(textBGCover,.5,{x:-271, ease:Sine.easeOut, delay:.4});
		TweenLite.to(CornerLeftF01,.6,{x:-330, ease:Sine.easeOut, delay:.2});
		TweenLite.to(BG01Image,1,{x:0, ease:Sine.easeOut, delay:.2});
		TweenLite.to(BG01Image,.4,{x:-20, ease:Sine.easeOut, delay:.2});

		TweenLite.to(CornerRightF01,.2,{x:-20, ease:Sine.easeOut, delay:.3, onComplete:frame02Out});
		TweenLite.to(CornerRightF01,.4,{x:0, ease:Sine.easeOut, delay:.5});
		TweenLite.to(TC,.2,{x:-20, ease:Sine.easeOut, delay:.5});
		TweenLite.to(LogoPayPal,.2,{x:-15, ease:Sine.easeOut, delay:.3});
	}
	frame02Out = function (){
		//Bring in texts
		TweenLite.to(TextF0101,.35,{x:TextAdjust, ease:Power0.easeNone});
		TweenLite.to(TextF0101,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.35});
		/*TweenLite.to(TextF0102,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.35});*/

		TweenLite.to(TextF0102,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.1});
		TweenLite.to(TextF0102,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.45});
		
		TweenLite.to(TextF0103,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.2});
		TweenLite.to(TextF0103,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.55});
		
		TweenLite.to(TextF0104,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.2});
		TweenLite.to(TextF0104,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.65});
		
		TweenLite.to(TextF0105,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.2});
		TweenLite.to(TextF0105,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.75});

		TweenLite.delayedCall(2.5,frame03);
	}

	// F03
	frame03 = function (){
		TweenLite.to(OverlaySlideF0201,.75,{x:-1500, ease:Sine.easeOut, delay:.1});
		TweenLite.to(OverlaySlideF0202,.8,{x:-1300, ease:Sine.easeOut, delay:.1});

		// add new corners
		TweenLite.to(CornerLeftF02,.6,{x:-330, ease:Sine.easeOut, delay:.2});
		TweenLite.to(CornerRightF02,.2,{x:-20, ease:Sine.easeOut, delay:.3});
		TweenLite.to(CornerRightF02,.4,{x:0, ease:Sine.easeOut, delay:.5, onComplete:frame03Out});

		// remove previous frame content
		TweenLite.to(CornerRightF01,0,{x:+40, ease:Sine.easeOut, delay:.3});
		TweenLite.to(CornerLeftF01,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0101,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0102,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0103,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0104,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0105,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(BG01Image,0,{x:+20, ease:Sine.easeOut, delay:.3});
		TweenLite.to(BG01Image,.4,{x:-20, ease:Sine.easeOut, delay:.3});
		
		//TweenLite.to(Logobrand,.4,{x:0, ease:Sine.easeOut, delay:.3});

		// Set New Bg if needed
		//TweenLite.to(textBG01,0,{opacity:1,delay:0.3});
	}

	frame03Out = function (){
		//Bring in texts
		TweenLite.to(TextF0201,.35,{x:TextAdjust+15, ease:Power0.easeNone});
		TweenLite.to(TextF0201,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.35});

		TweenLite.to(TextF0202,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.1});
		TweenLite.to(TextF0202,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.45});
		
		
		TweenLite.to(TextF0203,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.2});
		TweenLite.to(TextF0203,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.55});
		
		TweenLite.to(TextF0204,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.2});
		TweenLite.to(TextF0204,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.65});
	
		TweenLite.to(TextF0205,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.2});
		TweenLite.to(TextF0205,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.65});
		
		TweenLite.delayedCall(2.5,frame04);
	}

	// F04
	frame04 = function (){

		TweenLite.to(OverlaySlideF0301,.75,{x:-1500, ease:Sine.easeOut, delay:.1});
		TweenLite.to(OverlaySlideF0302,.8,{x:-1300, ease:Sine.easeOut, delay:.1});

		// add new corners
		TweenLite.to(CornerLeftF03,.6,{x:-330, ease:Sine.easeOut, delay:.2});
		TweenLite.to(CornerRightF03,.2,{x:-20, ease:Sine.easeOut, delay:.3});
		TweenLite.to(CornerRightF03,.4,{x:0, ease:Sine.easeOut, delay:.5, onComplete:frame04Out});

		// remove previous frame content
		TweenLite.to(CornerRightF02,0,{x:+40, ease:Sine.easeOut, delay:.3});
		TweenLite.to(CornerLeftF02,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0201,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0202,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0203,0,{x:-530, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0204,0,{x:-530, ease:Sine.easeOut, delay:.3});
		//TweenLite.to(TextF0205,0,{x:-530, ease:Sine.easeOut, delay:.3});

		// Set New Bg if needed
		TweenLite.to(textBG01,0,{opacity:1,delay:0.3});
	}
	frame04Out = function (){
		//Bring in texts
		TweenLite.to(TextF0301,.35,{x:TextAdjust+15, ease:Power0.easeNone});
		TweenLite.to(TextF0301,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.35});

		TweenLite.to(TextF0302,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.1});
		TweenLite.to(TextF0302,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.45});
		
		
		TweenLite.to(TextF0303,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.2});
		TweenLite.to(TextF0303,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.45});

		TweenLite.delayedCall(.5,frameEnd);
		//TweenLite.delayedCall(2.5,frame05);
	}

	// F05
	frame05 = function (){

		TweenLite.to(OverlaySlideF0401,.75,{x:-1500, ease:Sine.easeOut, delay:.1});
		TweenLite.to(OverlaySlideF0402,.8,{x:-1300, ease:Sine.easeOut, delay:.1});

		// add new corners
		TweenLite.to(CornerLeftF04,.6,{x:-330, ease:Sine.easeOut, delay:.2});
		TweenLite.to(CornerRightF04,.2,{x:-20, ease:Sine.easeOut, delay:.3});
		TweenLite.to(CornerRightF04,.4,{x:0, ease:Sine.easeOut, delay:.5, onComplete:frame05Out});

		// remove previous frame content
		TweenLite.to(CornerRightF03,0,{x:+40, ease:Sine.easeOut, delay:.3});
		TweenLite.to(CornerLeftF03,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0301,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0302,0,{x:-440, ease:Sine.easeOut, delay:.3});
		TweenLite.to(TextF0303,0,{x:-440, ease:Sine.easeOut, delay:.3});

		// Set New Bg if needed
		//TweenLite.to(textBG02,0,{opacity:1,delay:0.3});
	}
	frame05Out = function (){

		TweenLite.to(TextF0401,.35,{x:TextAdjust+15, ease:Power0.easeNone});
		TweenLite.to(TextF0401,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.35});

		TweenLite.to(TextF0402,.35,{x:TextAdjust+15, ease:Power0.easeNone, delay:.1});
		TweenLite.to(TextF0402,1.25,{x:TextAdjust, ease:Expo.easeOut, delay:.45});

		TweenLite.delayedCall(.5,frameEnd);
	}

	//Last Frame
	frameEnd = function (){
		//Bring in CTA & Logo		
		TweenLite.to(CTA,.4,{x:0, ease:Sine.easeOut, delay:.7});
		TweenLite.to(repeat,.4,{x:-5, ease:Sine.easeOut, delay:.9});
		
		
	}



	//CTA rollover 
	exitbtn.onmouseover = function(){
		//TweenLite.to(CTA, .5, {backgroundColor:CTACol02, ease:Power3.easeOut, delay:0.1});

	}

	exitbtn.onmouseout = function(){
		//TweenLite.to(CTA, .5, {backgroundColor:CTACol01, ease:Power3.easeOut, delay:0.1});
	}
	

	//Event Listeners
	addListeners = function (){
		// -- Clickthrough button is currently using standard ClickTag set up in the HTML doc.
		//exitBtn.addEventListener('click', onExitHandler, false);
	}

	onExitHandler = function(){
		// -- Add button code here for non-standard publisher
	}

	//Run Animations
	frameStart();

	function reload() {
		TweenLite.to(AllFrames,0,{x:-600});
		//TweenLite.to(Logobrand,0,{x:300});
		TweenLite.to(CTA,0,{x:165});
		TweenLite.to(TC,0,{x:300});
		TweenLite.to(repeat,0,{x:150});
		TweenLite.to(BG01Image,0,{x:-100});
		TweenLite.to(textBG01,0,{x:0});
		TweenLite.to(textBGCover,0,{x:0});
		TweenLite.to(LogoPayPal,0,{x:235});
		frameStart();
	}
