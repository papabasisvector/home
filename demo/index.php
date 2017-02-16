<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<title>Projects (Demo)</title>
<!-- <link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'> -->
<script src="http://use.edgefonts.net/source-sans-pro.js"></script>
<link rel="StyleSheet" href="/~minje/style.css" type="text/css">
</head>
<body>

<div id="container">
	<div id="header">
		<h1>
			<a href="/~minje/index.php">Minje Kim's Home</a>
		</h1>
	</div>
	<div id="navigation">
		<ul><center>
			<li><a href="/~minje/index.php">Home<br>(Contact)</a></li>
			<li><a href="/~minje/research">Research<br>Interest</a></li>
			<li><a href="/~minje/education">Education<br>& Work</a></li>
			<li><a href="/~minje/papers">Publications<br>& Patents</a></li>
			<li><a href="/~minje/demo">Projects<br>(Demo)</a></li>
			<li><a href="/~minje/funds">Awards<br />&Funds</a></li>
			<li><a href="/~minje/acts">Professional<br>Activites</a></li>						
			<li><a href="/~minje/etc">Extra-<br>curricular</a></li>
			<li><a href="/~minje/cv_minjekim.pdf" target=_blank>CV<br>(PDF)</a></li>
			<li><a href="http://scholar.google.com/citations?user=hEfnFKAAAAAJ&hl=en" target=_blank>Google<br>Scholar</a></li>			
		</ul></center>
	</div>
	<div id="content-container">
		
		<div id="content">
		
		<h2>
			<a id="cae">Collaborative Audio Enhancement — Crowdsource Your Recording</a>
		</h2>



		
		<center><img src="cae_scenario.png" width=500></center>
		<br>
		Such as in crowdsourcing, the project aims to improve the quality of the recordings from audio scenes, e.g. music concerts, talks, lectures, etc, by separating out the only interesting sources from multiple low-quality user-created recordings. This could be seen as a challenging microphone array setting with channels that are not synched, defected in unique ways, with different sampling rates. <br>
		<center><img src="cae_example.png" width=600></center>
		<br><br>
		We achieve the separation by using an extended probabilistic topic model that enables sharing of some topics (sources) across the recordings. To put it another way, we do the usual matrix factorization for each recording, but fix some of the sources	to be the same (with different global weights) across the simultaneous factorizations for	all recordings.
		<br><br>
		<center><img src="cae_factorization.png" width=600></center>
		<br><br>
		We could get better separation from some synthetic concert recordings than the oracle matrix factorization results with ideal bases pre-learned from the ground truth clean recording. We plan to accelerate this	algorithm so that it can cope with a really big audio dataset.
		<br><br>
		<center><img src="cae_results.png" width=500> </center>
		Check out our award-winning paper about this project: "<a href="../papers/icassp2013_mkim.pdf" target=_blank>Collaborative Audio Enhancement Using Probabilistic Latent Component Sharing</a> (ICASSP 2013)"<br>
		And some audio clips:
		<ul>
		<li>Input#1: low-pass filtered recording (8kHz) with a speech interference (<a href="cae_input1.wav" target=_blank>wav</a>)</li>
		<li>Input#2: high-pass filtered recording (500Hz) with another speech interference (<a href="cae_input2.wav" target=_blank>wav</a>)</li>
		<li>Input#3: low-pass filtered (11.5Hz) and high-pass filtered (500kHz) recording with clipping artifacts (<a href="cae_input3.wav" target=_blank>wav</a>)</li>
		<li>Enhanced audio using PLCS plus both priors (<a href="cae_output.wav" target=_blank>wav</a>)</li>
		</ul>
		<p style="padding:6px; color:888888; border: black 1px solid">&#8251; This material is based upon work supported by the National Science Foundation under Grant: <a href="http://www.nsf.gov/awardsearch/showAward?AWD_ID=1319708&HistoricalAwards=false" target=_blank>III: Small: MicSynth: Enhancing and Reconstructing Sound Scenes from Crowdsourced Recordings</a>. <em>Award #:1319708</em><br>
<em>Any opinions, findings, and conclusions or recommendations expressed in this material are those of the author(s) and do not necessarily reflect the views of the National Science Foundation.</em></p>			
		<br><br>		



		<HR>		
		<!-- Irregular Matrix Factorization -->
		<h2>
			<a id="irregularNMF">Irregular Matrix Factorization</a>
		</h2>
		Do you want to apply Nonnegative Matrix Factorization (NMF) to the non-matrix types of data? Here is an efficient way to do the job. We sometimes observe irregular data structures e.g. reassigned spectra, very sparse landmarks, etc, that cannot be efficiently represented with ordinary matrices with the grid-structure. Furthermore, we might want to decompose this observation to discover some underlying patterns as if we do with the regular matrix factorization techniques. 
		<br><br>
		<center><img src="irregularNMF_toy.png" width=620></center>
		<br><br>
		The main idea is to represent the input with the sparse form, i.e. pairs of indices and values, and to reformulate the original NMF problem for the vectorized input. To expedite the learning, we involve the concept of the non-parametric density estimation, so that each data point is affected by the density only from the closest observations. If we apply this to some difficult music transcription tasks, such as a music piece where bass guitar and drum playing at the same time. The case is particularly difficult since we need very high resolutions in both time and frequency axes, but the usual short time Fourier transform can do that only along one of the directions. We can do the nice decomposition on this non-matrix form of data using the proposed method.
		<br><br>
		<center><img src="irregularNMF_bongo_and_bass.png" width=620></center>
		<br><br>
		See our paper, "<a href="../papers/waspaa2013_psmaragdis.pdf" target=_blank>Non-Negative Matrix Factorization for Irregularly-Spaced Transforms</a> (WASPAA 2013)," for more detail.
		<br><br>
		
		
				
		<HR>		
		<!-- Manifold Preserving Source Separation -->
		<h2>
			<a id="manifold">Manifold Preserving Source Separation</a>
		</h2>
		Usual topic models or NMF-like factorizations result in a wrapper, i.e. a convex hull or cone, that compactly contains the input spectra. When it comes to separation, we assume pre-defined several wrappers like that are available, one for each training source, and hope that they do not	overlap each other, while in practice they often do so. 
		<br><br>
		<center><img src="manifold_convex_hulls.png"></center>
		<br><br>		
		The wrapper is a lossy representation	of the full training spectra that works like a dictionary of templates. What it sacrifices is the minute details of the	data manifold, which is sometimes critical for recovering quality audio signals. We are working on some probabilistic	topic models with sparsity constraints so as to learn the <em>hyper topics</em> each of which represents only its local neighbors. Those hyper topics play a role in getting manifold preserving quantization of training signals instead of wrappers
		<br><br>
		<center><img src="manifold_quantization.png"></center>
		<br><br>
		and in leading the recovered source spectra to lying on the original data manifold.
		<br><br>
		<center><img src="manifold_separation.png"></center>
		<br><br>
		See our paper for more detail: "<a href="../papers/icml2013_mkim.pdf" target=_blank>Manifold Preserving Hierarchical Topic Models for Quantization and Approximation</a> (ICML 2013)"
		<br><br>
		
<HR>
			
		


<ul>
<li><b><a name="aes2011">Vocal Source Separation Demo</a></b></li>
	<ul>
	<li>Related Paper : "Gaussian Mixture Model for Singing Voice Separation From Stereophonic Music,"
Audio Engineering Society (AES) 43rd International Conference</li>
		<ul>
		<li>Input music mixture (<a href="AES2011/IU_Mixture.mp3" target=_blank>mp3</a>)</li>
		<li>Accompanyment reconstruction (<a href="AES2011/IU_Accom_Recons.mp3" target=_blank>mp3</a>)</li>
		</ul>
	</ul>

<li><b><a name="jstsp2011">Drum Source Separation Demo</a></b></li>
	<ul>
	<li>Related Paper : "Nonnegative Matrix Partial Co-Factorization for Spectral and Temporal Drum Source Separation",
IEEE Journal of Selected Topics in Signal Processing, 2011</li>
		<ul>
		<li>Input music mixture (<a href="JSTSP2011/Mixture_06_20sec.wav" target=_blank>wav</a>)</li>
		<li>Original drum sources (<a href="JSTSP2011/Rhythm_06_20sec.wav" target=_blank>wav</a>)</li>
		<li>Drum source reconstruction using the proposed ST-DSS method (<a href="JSTSP2011/RhythmRecons_06_STDSS_20sec.wav" target=_blank>wav</a>)</li>
		<li>Drum source reconstruction using S-DSS method (<a href="JSTSP2011/RhythmRecons_06_SDSS_20sec.wav" target=_blank>wav</a>)</li>
		<li>Drum source reconstruction using T-DSS method (<a href="JSTSP2011/RhythmRecons_06_TDSS_20sec.wav" target=_blank>wav</a>)</li>
		</ul>
	</ul>
<li><b><a name="ica2006">Monaural Music Source Separation Demo</a></b></li>
	<ul>
	<li>Related Paper : "Monaural Music Source Separation: Nonnegativity, Sparseness, and Shift-Invariance",
LVA/ICA 2006</li>
		<ul>
		<li>original voice /ah/ sound (<a href="ica2006/voice_8000.wav" target=_blank>wav</a>)</li>
		<li>original cello sound (<a href="ica2006/cello_8000.wav" target=_blank>wav</a>)</li>
		<li>monaural mixture of voice and cello sound (<a href="ica2006/voice_cello_8000.wav" target=_blank>wav</a>)</li>
		<li>recovered voice /ah/ sound (<a href="ica2006/voice_recons.wav" target=_blank>wav</a>)</li>
		<li>recovered cello sound (<a href="ica2006/cello_recons.wav" target=_blank>wav</a>)</li>
		</ul>
	</ul>
</ul>

<?include '../tail.html';?>