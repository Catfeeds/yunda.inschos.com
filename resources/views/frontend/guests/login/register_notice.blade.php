	@extends('frontend.guests.guests_layout.base')
	<link rel="stylesheet" href="{{config('view_url.view_url')}}css/lib/idangerous.swiper.css" />
	<link rel="stylesheet/less" href="{{config('view_url.view_url')}}css/index.less"/>
	<script src="{{config('view_url.view_url').'js/lib/less.min.js'}}"></script>
	@section('content')
				<div class="main policy-wrapper">
					<h1>用户服务协议</h1>
					<div class="section">
						<h2 class="appellation">尊敬的会员：</h2>
						<p>欢迎注册“e保云”，在使用前请您仔细阅读《用户服务协议》。若勾选"我已经认真阅读并同意《用户服务协议》"，则意味着您已经接受并自愿遵守本协议。阅读协议的过程中，如果您不同意或无法理解本协议的任意内容，请不要点击“我已阅读并同意”按钮，并应立即停止注册程序。</p>
					</div>
					<div class="section">
						<h2>一、注册条款</h2>
						<p>若您申请注册成为e保云的会员或使用、接受e保云的服务时，您须遵守以下规则：</p>
						<ul>
							<li>1.您应是具有法律规定的完全民事权利能力和民事行为能力，能够独立承担民事责任的自然人、法人或其他组织。若您不具备前述主体资格，您应当立即停止注册或停止使用e保云的服务，由此导致的一切后果由您及您的监护人承担；</li>
							<li>2.在注册时，向e保云提供真实、准确、即时、完整的注册信息及相应的证件资料并及时更新上述信息及资料以保持其真实、准确、即时、完整，包括但不限于您的姓名、性别、年龄、出生日期、身份证号码或者企业名称、营业执照注册号、住所地等；</li>
							<li>3.如您代表其他自然人、法人及其他组织在e保云上注册会员，则您声明并保证，您已获得授权并有权使前述法律主体受本协议的约束。</li>
						</ul>
					</div>
					<div class="section">
						<h2>二、使用条款</h2>
						<p>1.您在使用本网站服务时，应遵守国家《计算机信息系统国际联网保密管理规定》、《中华人民共和国计算机信息系统安全保护条例》、《计算机信息网络国际联网安全保护管理办法》等相关法律规定、e保云的相关协议及规则，禁止任何违法违规行为，如：</p>
						<ul>
							<li>1) 任何干扰或破坏e保云官网或与e保云相连的服务器和网络，及从事其他干扰或破坏e保云服务的活动，将e保云用作任何非法用途；</li>
							<li>2) 通过e保云发布、传播有关宗教、种族或性别等的贬损言辞；</li>
							<li>3) 侵犯党和国家利益的言论；</li>
							<li>4) 骚扰、滥用或威胁其他用户的信息、广告信息；</li>
							<li>5) 侵犯任何第三方著作权、专利、商标、商业秘密或其他专有权利或名誉权的信息；</li>
							<li>6) 其他任何违反国家相关法律法规的信息。</li>
						</ul>
						<p>2.您须妥善保管本人的用户名和密码，及装载和使用e保云应用的设备。凡使用该用户名和密码的行为，e保云视为您本人的操作，操作所产生的电子信息记录均为e保云用户行为的有效凭据。您对利用该用户名和密码所进行的一切活动负全部责任。</p>
					</div>
					<div class="section">
						<h2>三、责任声明</h2>
						<p>对使用e保云而产生的风险由用户自己承担，e保云明确不提供任何明示或者默示的担保。e保云对下列事项不作任何陈述与保证：</p>
						<ul>
							<li>1.e保云的服务符合您的要求或经验。</li>
							<li>2.您使用e保云的服务后所产生的任何行为，如购买或获得的任何产品、服务、信息或其他事物等，将符合您的要求或经验。</li>
							<li>3.e保云是不受干扰的、没有故障的，也不对使用效果做任何保证。您同意独立承担因网站意外中断、操作或传输的迟延、电脑病毒、网络连接故障、未经授权的进入等引起的损失。</li>
							<li>4.e保云含有与其他网站的链接。e保云与链接的网站有合作关系，但并不能控制这些网站及其所提供的资源，所以e保云对链接网站上的内容、广告、服务、产品信息的真实有效性不负责任，并且对因链接网站上的内容、广告、服务、产品信息的失实而造成的损失不负任何法律责任。</li>
						</ul>
					</div>
					<div class="section">
						<h2>四、知识产权声明</h2>
						<ul>
							<li>1.e保云在本服务中所包含的内容（包括但不限于网页、文字、图片、音频、视频、图表等）及提供本服务时所依托软件的著作权、专利权及其他知识产权均归e保云及关联公司所有。</li>
							<li>2.本服务包含的内容的知识产权均受到法律保护，您若侵犯e保云相关知识产权需承担损害赔偿责任。</li>
						</ul>
					</div>
					<div class="section">
						<h2>五、协议终止</h2>
						<p>您同意：出现以下情形，e保云有权在告知或未经告知的情况下中止或终止向您提供部分或全部服务，且无须因此向您或任何第三方承担任何责任，且保留追究您法律责任的权利：</p>
						<ul>
							<li>1) 向e保云提供的信息或资料不真实、不准确、不即时、不完整；</li>
							<li>2) 实施或计划实施破坏、攻击e保云的电脑系统、网络的完整性，或者试图擅自进入e保云电脑系统、网络；</li>
							<li>3) 使用或提供含有毁坏、干扰、截取或侵占任何系统、数据或个人资料的任何电脑病毒、伪装破坏程序、电脑蠕虫、定时程序炸弹或其他破坏性程序；</li>
							<li>4) 盗用他人在e保云上的用户名或密码；</li>
							<li>5) 未经e保云书面同意，擅自允许他人使用e保云的服务（包括但不限于擅自允许他人使用其用户名或密码，或者擅自将其用户名或密码转让给他人的），或者通过e保云获得相关信息。</li>
							<li>6) 出现其他任何违法、违纪或违约的情形。</li>
							<li>7) 一旦您的会员资格或服务被中止或终止，e保云有权随时删除您在e保云的注册信息及相关资料；对您在会员资格或服务中止或终止前的行为，e保云保留追究您法律责任的权利。</li>
						</ul>
					</div>
					<div class="section">
						<h2>六、法律适用及管辖</h2>
						<p>本协议条款的解释及适用，以及与本协议条款有关的争议，均应依照中华人民共和国法律予以处理，并以e保云所在地人民法院为一审管辖法院。</p>
					</div>
					<div class="section">
						<h2>七、提示条款</h2>
						<p>e保云平台提醒您：在使用e保云平台各项服务前，请您务必仔细阅读并透彻理解本声明。如对本声明内容有任何疑问，您可向e保云平台客服咨询。阅读本声明的过程中，如果您不同意本声明或其中任何内容，您应立即停止使用e保云平台服务。如果您使用e保云平台服务的，您的使用行为将被视为对本声明全部内容的认可。</p>
					</div>
					<h1>法律声明及隐私权政策</h1>
					<div class="section">
						<h2>一、网站使用</h2>
						<p>用户在使用本网站时，遵守所有与本网站提供的网络服务相关的网络协议、规定、程序和规则，禁止条款：</p>
						<ul>
							<li>1、不得干扰或破坏本网站或与本网站相连的服务器和网络及从事其它干扰或破坏本网站服务的活动，不得将本网站作任何非法用途；</li>
							<li>2、不得上载、张贴或发送任何非法、有害、诽谤、猥亵、侵害他人隐私权、散布种族歧视或伤风败俗的信息资料；</li>
							<li>3、不得上载、张贴或发送任何教唆他人构成犯罪行为的信息资料；</li>
							<li>4、不得强行上载、张贴、发送和传送推销信件、广告信息、垃圾邮件等内容。</li>
						</ul>
					</div>
					<div class="section">
						<h2>二、网站内容</h2>
						<ul>
							<li>1、本网站在建设中引用了互联网上的一些资源并对有明确来源的注明了出处，版权归原作者及网站所有，如果您认为本网站中有侵犯您权益的内容，请通知本网站；</li>
							<li>2、对于其他网址链接在本网站的内容，以及其他人输入的并非本网站公布的内容，本网站不承担任何责任；</li>
							<li>3、本网站作为保险电子商务平台，网站提供的各种保险产品均已跟保险公司签属了网销协议，本网站和相应保险公司对各产品及保险条款的准确性和完整性承担保证责任。</li>
						</ul>
					</div>
					<div class="section">
						<h2>三、隐私保护</h2>
						<ul>
							<li>1、本网站的用户在注册会员或投保时提供的个人资料，如：姓名、出生日期、电话、电子邮件、身份证号码、银行卡号、健康状况和病史资料等，e保云郑重承诺在未经用户同意的情况下，绝对不会将用户的任何资料以任何方式泄露给任何第三方；</li>
							<li>
								2、我们不会向第三方透露您的个人信息，但以下情况除外：
								<ul>
									<li>（1）事先获得您的授权，您同意让第三方共享资料；</li>
									<li>（2）只有提供个人相关资料，才能提供你所要求的产品和服务；</li>
									<li>（3）根据有关的法律法规或相关政府主管部门要求；</li>
									<li>（4）为免除您在生命、身体或财产方面之急迫危险；</li>
									<li>（5）我们需要向代表我们提供产品或服务的保险公司提供资料（除非我们另行通知你，否则这些公司无权使用你的身份识别资料），如您通过本站购买保险产品，您的个人信息将会传递给您所选择的保险公司；</li>
								</ul>
							</li>
							<li>3、 若有下列情况之一者，本网站将不承担任何法律责任：
								<ul>
									<li>（1）由于用户将个人密码告知他人或与他人共享注册账户，由此导致的任何个人资料泄露；</li>
									<li>（2）任何由于黑客攻击、计算机病毒侵入或发作、政府管制等造成的暂时性关闭，使网络无法正常运行而造成的个人资料泄露、丢失、被盗用或被窜改等；</li>
									<li>（3）由于与本网站链接的其它网站所造成之个人资料泄露及由此而导致的任何法律争议和后果，如果我们对该第三方的信息批露是被允许的；</li>
									<li>（4）由于其他不可抗力因素而引起的任何后果。</li>
								</ul>
							</li>
							<li>4、 e保云不向未成年人销售保险产品。我们向成年人销售被保险人为儿童的保险产品。如果您不满18岁，只有在父母或监护人参与的情况下您才能通过e保云成为被保险人。</li>
						</ul>
					</div>
					<div class="section">
						<h2>四、信息安全</h2>
						<p>e保云有相应的安全措施来确保我们掌握的信息不丢失，不被滥用和变造。这些安全措施包括向其它服务器备份数据和对用户密码加密。尽管我们坚持按照行业标准实践来保护您的个人信息和机密数据，我们并不能确保这些信息和数据不会以本隐私声明所述外的其他方式被泄露。</p>
					</div>
				</div>
			</div>
		</div>
		@stop
