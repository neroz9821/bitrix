<? if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var NerozProfileDetailComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */
?>

<div class="personal-data">
	<div class="personal-data__header">
		<div class="personal-data__title">Данные аккаунта</div>
		<a data-da=".personal-data,1800,last" href="javascript:void(0)" onclick="logout()" class="personal-data__log-out trnt-btn">Выйти из аккаунта</a>
	</div>
	<div class="personal-data__content js-user-data">
		<div class="personal-data__row">
			<div class="personal-data__name">ФИО</div>
			<div class="personal-data__text js-user-name"><?=$arResult["NAME"]?></div>
			<a href="#" class="personal-data__change">
				<svg class="personal-data__change-svg">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_change"></use>
				</svg>
			</a>
			<form class="personal-data__change-block form form-ajax"
				method="post"
				data-parsley-validate=""
				action="<?=POST_FORM_ACTION_URI?>"
				novalidate=""
				data-component="<?=$this->__component->getName()?>"
				data-action="updateName"
				name="updateName"
				>
				<div class="form__line">
					<input type="text" name="name" data-error="Ошибка" data-value="" class="personal-data__input form__input">
				</div>
				<button type="submit" class="personal-data__btn">
					<svg class="personal-data__btn-svg">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_enter"></use>
					</svg>
				</button>
			</form>
		</div>
		<div class="personal-data__row">
			<div class="personal-data__name">Название компании</div>
			<div class="personal-data__text js-user-workcompany"><?=$arResult["WORK_COMPANY"] ?: "Не указано" ?></div>
			<a href="#" class="personal-data__change">
				<svg class="personal-data__change-svg">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_change"></use>
				</svg>
			</a>
			<form 
				method="post"
				data-parsley-validate=""
				action="<?=POST_FORM_ACTION_URI?>"
				class=" personal-data__change-block form form-ajax"
				novalidate=""
				data-component="<?=$this->__component->getName()?>"
				data-action="updateCompany"
				name="updateCompany"
				>
				<div class="form__line">
					<input type="text" name="сompany" data-error="Ошибка" data-value="" class="personal-data__input form__input">
				</div>
				<button type="submit" class="personal-data__btn">
					<svg class="personal-data__btn-svg">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_enter"></use>
					</svg>
				</button>
			</form>
		</div>
		<div class="personal-data__row">
			<div class="personal-data__name">E-mail</div>
			<div class="personal-data__text js-user-email"><?=$arResult["EMAIL"]?></div>
			<a href="#" class="personal-data__change">
				<svg class="personal-data__change-svg">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_change"></use>
				</svg>
			</a>
			<form
				method="post"
				data-parsley-validate=""
				action="<?=POST_FORM_ACTION_URI?>"
				class=" personal-data__change-block form form-ajax"
				novalidate=""
				data-component="<?=$this->__component->getName()?>"
				data-action="updateEmail"
				name="updateEmail"
				>
				<div class="form__line">
					<input type="text" name="email" data-error="Ошибка" data-value="" class="personal-data__input form__input">
				</div>
				<button type="submit" class="personal-data__btn">
					<svg class="personal-data__btn-svg">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_enter"></use>
					</svg>
				</button>
			</form>
		</div>
		<div class="personal-data__row">
			<div class="personal-data__name">Телефон</div>
			<div class="personal-data__text js-user-phone"><?=$arResult["PHONE"] ?: "Не указан" ?></div>
			<a href="#" class="personal-data__change">
				<svg class="personal-data__change-svg">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_change"></use>
				</svg>
			</a>
			<form
				method="post"
				data-parsley-validate=""
				action="<?=POST_FORM_ACTION_URI?>"
				class=" personal-data__change-block form form-ajax"
				novalidate=""
				data-component="<?=$this->__component->getName()?>"
				data-action="updatePhone"
				name="updatePhone"
				>
				<div class="form__line">
					<input type="text" name="phone" data-error="Ошибка" data-value="" class="personal-data__input form__input">
				</div>
				<button type="submit" class="personal-data__btn">
					<svg class="personal-data__btn-svg">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_enter"></use>
					</svg>
				</button>
			</form>
		</div>
		<div class="personal-data__row">
			<div class="personal-data__name">Пароль</div>
			<div class="personal-data__text">*******</div>
			<a href="#" class="personal-data__change">
				<svg class="personal-data__change-svg">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_change"></use>
				</svg>
			</a>
				<form
					method="post"
					data-parsley-validate=""
					action="<?=POST_FORM_ACTION_URI?>"
					class=" personal-data__change-block form form-ajax"
					novalidate=""
					data-component="<?=$this->__component->getName()?>"
					data-action="changePassword"
					name="changePassword"
				>
					<div class="form__line">
						<input type="text" name="password" data-error="Ошибка" data-value="" class="personal-data__input form__input">
					</div>
					<button type="submit" class="personal-data__btn">
						<svg class="personal-data__btn-svg">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_enter"></use>
						</svg>
					</button>
				</form>
		</div>
	</div>
</div>
<div class="addresses">
	<div class="addresses__header">
		<h2 class="addresses__title">Профили доставки</h2>
		<a href="#add-profile" class="addresses__btn-add trnt-btn js_popup-link">Добавить профиль</a>
	</div>

	<div class="addresses__content js-address-list">
		<template class="js-address-template">
			<div class="addresses__item active js-address" data-profile-id data-value-id>
				
				<input checked type="radio" name="profile"  class="addresses__input js-set-profile-default">

				<label  class="addresses__label">
					<div class="addresses__item-inner">
						<div class="addresses__item-name profile_address js-profile-property" id="aderssitem" data-prop-code="ADDRESS" >Адрес</div>
						<div class="addresses__item-row ">
							<? foreach ($arResult["PROFILE_PROPERTIES"] as $key => $property): ?>
								<?
									if ($property["NAME"] == "Адрес доставки") {
										continue;
									}
								?>
								<div class="addresses__item-text js-profile-property" data-prop-type="<?=$property["PERSON_TYPE_ID"]?>" data-prop-code=<?=$property["CODE"]?>></div>
							<? endforeach; ?>
						</div>
					</div>
				</label>
				<a href="#change-data" class="addresses__change-data grey-btn js_popup-link js-fill-profile">Изменить данные</a>
				<button  onclick="deleteAddress(this)"  class="addresses__del-btn">
					<svg class="addresses__del-btn-svg">
						<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_del"></use>
					</svg>
				</button>
			</div>
		</template>
		<?

			$first = true;
			$i = 0;
		?>

		<? foreach ($arResult["PROFILES"] as $key => $profile): ?>
				
				<div class="addresses__item  <?=$first? "active":""?> js-address" data-profile-id=<?=$profile["ID"]?>>
					<input  <?=$first? "checked":""?>  type="radio" name="profile" value="<?=$profile["ID"]?>" id="profile<?=$profile["ID"]?>" class="addresses__input">
					<label for="profile1" class="addresses__label">
						<div class="addresses__item-inner">
							<? foreach ($arResult["PROFILE_PROPERTIES"] as $key => $property): ?>

								<?
								$value = $property['VALUES'][$profile["ID"]];
								if ($property["PERSON_TYPE_ID"] != $profile["PERSON_TYPE_ID"]) {
									continue;
								}
								if (empty($value["VALUE"])) {
									continue;
								}
								?>
								<?
								if ($value["NAME"] == "Адрес доставки"){
									$adresDost = $value["VALUE"];
									$adresDostName = $value["NAME"];
									$adresDostCode = $property["CODE"];

								}else{
									$arrProps[$key]["NAME"] = $value["NAME"] ;
									$arrProps[$key]["VALUE"] = $value["VALUE"];
									$arrProps[$key]["CODE"] = $property["CODE"];	
								}
								?>
							<? endforeach; ?>	


							<div class="addresses__item-name js-profile-property " data-prop-code=<?=$adresDostCode?>><?=$adresDost?></div>				
							<div class="addresses__item-row">
								<?foreach ($arrProps as $key => $value) {?>
									<div class="addresses__item-text js-profile-property" data-prop-code=<?=$value["CODE"]?> ><?=$value["VALUE"]?></div>
								<?}?>
							</div>
						</div>
					</label>
					<a href="#change-data" class="addresses__change-data grey-btn js_popup-link js-fill-profile" data-profile-type=<?=$profile["PERSON_TYPE_ID"]?>>Изменить данные</a>
					<button  onclick="deleteAddress(this)"  class="addresses__del-btn">
						<svg class="addresses__del-btn-svg">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg/sprite.svg#icon_del"></use>
						</svg>
					</button>
				</div>
					<?
					$arrProps = [];
					$first = false;
					?>
			<? endforeach; ?>
	</div>
</div>

<!-- Модалка Добавить адрес -->
<div class="popup popup_add-profile modal-add-address">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__top">
				<div class="popup__title">Добавить профиль</div>
				<div class="popup__close"></div>
			</div>
			<div class="popup__center">
				<div class="popup__form">
					<form
						method="post"
						data-parsley-validate=""
						action="<?=POST_FORM_ACTION_URI?>"
						class="form form-ajax"
						novalidate=""
						data-component="<?=$this->__component->getName()?>"
						data-action="addProfile"
						name="addProfile"
					>
						<? foreach ($arResult["PROFILE_PROPERTIES"] as $key => $property): ?>
							<?

								if ($property["CODE"] == "LOCATION") {
									continue;
								}
							?>
							<div class="form__line js-forminputs" data-typepersonalid="<?=$property["PERSON_TYPE_ID"]?>" >
								<input 
								type="text"
								name="properties[<?=$property["CODE"]?>]"
								class="form__input"
								autocomplete="off"  
								data-error="Введите	<?=$property["NAME"]?>" 
								data-value="<?=$property["NAME"]?>">
							</div>
						<? endforeach; ?>
						<div class="form__line form__line_radio">
							<input required type="radio" name="typepayer" id="ownership_1" value="1" class="addresses__input" checked>
							<label for="ownership_1">Физическое лицо</label>
						</div>
						<div class="form__line form__line_radio">
							<input required  type="radio" name="typepayer" id="ownership_2" value="2" class="addresses__input">
							<label for="ownership_2">Юридическое лицо</label>
						</div>
						<button
							class="form__button green-btn"
							type="submit"
						>
							Сохранить
						</button>
						<div class="error-text">
							Неизвестная ошибка
						</div>
						<div class="loading-text">
							Обновляю адрес
						</div>
						<div class="success-text">
							Адрес успешно сохранен
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Модалка Изменить адрес -->
<div class="popup popup_change-data">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__top">
				<div class="popup__title">Изменение данных</div>
				<div class="popup__close"></div>
			</div>
			<div class="popup__center">
				<div class="popup__form">
					<form
						method="post"
						data-parsley-validate=""
						action="#"
						class="form form-ajax"
						novalidate=""
						data-component="<?=$this->__component->getName()?>"
						data-action="updateProfile"
						name="updateProfile"
					>
					<input type="hidden" name="profileId">
						<? foreach ($arResult["PROFILE_PROPERTIES"] as $key => $property): ?>
							<?

								if ($property["CODE"] == "LOCATION") {
									continue;
								}
							?>
							<div style="display: none;" class="form__line js-forminputs" data-typepersval="<?=$property["PERSON_TYPE_ID"]?>" >
								<input 
								type="text"
								name="properties[<?=$property["CODE"]?>]"
								class="form__input"
								autocomplete="off"  
								data-error="Введите	<?=$property["NAME"]?>" 
								data-value="<?=$property["NAME"]?>">
							</div>
						<? endforeach; ?>

						
						<button class="form__button green-btn" type="submit">
							Сохранить
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/js/jquery.suggestions.min.js"></script>

<script>
	var token = "ca2bad072c05649ff5caa92b1727b4b05270529e";

	var $city   = $("input[name='properties[CITY]']");
	var $street = $("input[name='properties[ADDRESS]']");

	var $city2   = $("input[name='properties[CITYYR]']");
	var $street2  = $("input[name='properties[ADDRESSYR]']");
	function showPostalCode(suggestion) {
	  $("#postal_code").val(suggestion.data.postal_code);
	}

	function clearPostalCode() {
	  $("#postal_code").val("");
	}

	
	var defaultFormatResult = $.Suggestions.prototype.formatResult;
	function formatResult(value, currentValue, suggestion, options) {
	  var newValue = suggestion.data.city;
	  suggestion.value = newValue;
	  return defaultFormatResult.call(this, newValue, currentValue, suggestion, options);
	}

	function formatSelected(suggestion) {
	  return suggestion.data.city;
	}
    // город и населенный пункт
	$city.suggestions({
	  token: token,
	  type: "ADDRESS",
	  hint: false,
	  bounds: "city",
	  constraints: {
	    locations: { city_type_full: "город" }
	  },
	   formatResult: formatResult,
  		formatSelected: formatSelected,
	});

	$street.suggestions({
	  token: token,
	  type: "ADDRESS",
	  hint: false,
	  bounds: "street-house",
	  constraints: $city,
	  onSelect: showPostalCode,
	  onSelectNothing: clearPostalCode
	});

	$city2.suggestions({
	  token: token,
	  type: "ADDRESS",
	  hint: false,
	  bounds: "city",
	  constraints: {
	    locations: { city_type_full: "город" }
	  },
	   formatResult: formatResult,
  		formatSelected: formatSelected,
	});

	$street2.suggestions({
	  token: token,
	  type: "ADDRESS",
	  hint: false,
	  bounds: "street-house",
	  constraints: $city2,
	  onSelect: showPostalCode,
	  onSelectNothing: clearPostalCode
	});
</script>
<script>

document.addEventListener('DOMContentLoaded', function(){
	$('.js-forminputs').each(function(i, obj) {
	   if ($(this).data('typepersonalid') == 1) {
	   		$(this).show()
	   		$(this).find(".form__input").attr('required', '');

	   }else{
	   		$(this).hide()
	   		$(this).find(".form__input").attr('disabled', '');
	   }
	});
	$('.form-ajax input[type="radio"]').on('change', function(){
		var idtype = $(this).val();
		$('.js-forminputs').each(function(i, obj) {
			if ($(this).data('typepersonalid') == idtype) {
				$(this).show()
   				$(this).find(".form__input").attr('required', '');
   				$(this).find(".form__input").removeAttr('disabled', '');
			}else{
				$(this).hide()
   				$(this).find(".form__input").removeAttr('required');
   				$(this).find(".form__input").attr('disabled', '');
			}

		});
	});
});




function setAddressLooksActive(node) {
	let list = [...document.querySelectorAll('.js-address-list .js-address')]
	list.filter(n => n.classList.contains('active')).map(n => {
		n.classList.remove('active')
		var setDefaultButton = n.querySelector('.js-set-profile-default')
		setDefaultButton.classList.removeAttribute('checked')
	})
	node.classList.add('active')
	var setDefaultButton = node.querySelector('.js-set-profile-default')
	setDefaultButton.classList.addAttribute('checked')
	
}

globalClickHandlers['js-set-profile-default'] = async (node) => {
	var container = node.closest('.js-address')

	let body = new FormData()
	body.append('sessid', window.BX.bitrix_sessid())
	body.append('ID', parseInt(container.dataset.profileId))
	let getParams = `?mode=class&c=<?=$this->__component->getName()?>&action=profileSetDefault`

	let res = await fetch(
		"/bitrix/services/main/ajax.php" + getParams,
		{
			method: "POST",
			body,
		}
	).then(r => r.json())

	if (res.status === "error") {
		console.log(res.errors);
	} else {
		setAddressLooksActive(container)
	}
}




var userEmail = new AjaxForm(document.forms.updateEmail)
userEmail.onSuccess = function(res) {
	this.__proto__.onSuccess.call(this, res)
	document.querySelector('.js-user-email').innerText = this.lastData.get('email')
}

var userCompany = new AjaxForm(document.forms.updateCompany)
userCompany.onSuccess = function(res) {
	this.__proto__.onSuccess.call(this, res)
	console.log(this.lastData.get('company'));
	document.querySelector('.js-user-workcompany').innerText = this.lastData.get('сompany')
}

var userName = new AjaxForm(document.forms.updateName)
userName.onSuccess = function(res) {
	this.__proto__.onSuccess.call(this, res)
	document.querySelector('.js-user-name').innerText = this.lastData.get('name')
}

var userPhone = new AjaxForm(document.forms.updatePhone)
userPhone.onSuccess = function(res) {
	this.__proto__.onSuccess.call(this, res)
	document.querySelector('.js-user-phone').innerText = this.lastData.get('phone')
}

globalClickHandlers['js-clear-address'] = (node) => {
	document.forms.addProfile.reset()
}
globalClickHandlers['personal-data__change'] = (node) => {
	console.log(node);
}

var addProfileForm = new AjaxForm(document.forms.addProfile)
addProfileForm.onSuccess = function(res) {
	this.__proto__.onSuccess.call(this, res)
	var newNode = document.querySelector('.js-address-template').content.children[0].cloneNode(true)
	newNode.dataset.profileId = res.data.profile.ID
	// newNode.querySelector('.profile-address__number').innerText = res.data.profile.ID
	var persontype = this.lastData.get(`typepayer`)
	if (persontype == 1) {
		newNode.querySelector('#aderssitem').textContent = this.lastData.get(`properties[ADDRESS]`)
	}else{
		newNode.querySelector('#aderssitem').textContent = this.lastData.get(`properties[ADDRESSYR]`)
	}

	var props = [...newNode.querySelectorAll('.js-profile-property')]
	props.map(p => {
		var code = p.dataset.propCode
		var type = p.dataset.propType

		if(type == this.lastData.get(`typepayer`)){
			p.innerText = this.lastData.get(`properties[${code}]`)
		}
		
	})

	document.querySelector('.js-address-list').prepend(newNode)
	setAddressLooksActive(newNode)
}


var updateProfileForm = new AjaxForm(document.forms.updateProfile)
updateProfileForm.onSuccess = function(res) {
	this.__proto__.onSuccess.call(this, res)
	var profile = document.querySelector('.js-address-list .js-address[data-profile-id="'+this.lastData.get("profileId")+'"]');
	var props = [...profile.querySelectorAll('.js-profile-property')]
	props.map(p => {
		var code = p.dataset.propCode

		p.innerText = this.lastData.get(`properties[${code}]`)
	})
}

globalClickHandlers['js-fill-profile'] = (node) => {
	var container = node.closest('.js-address')
	var form = document.forms.updateProfile
	var typsProfile = node.dataset.profileType
	form.querySelector("input[name=profileId]").value = container.dataset.profileId
	var props = [...container.querySelectorAll('.js-profile-property')]
	props.map(p => {	
		var code = p.dataset.propCode
		console.log(code)
		var div_array = [...form.querySelectorAll(`.js-forminputs`)];
		div_array.forEach(div => {
			if(div.dataset.typepersval == typsProfile){
				div.style.display = 'block';
				div.querySelector("input").disabled = false;

			}else{
				div.style.display = 'none';
				div.querySelector("input").disabled = true;
			}
			 form.querySelector(`input[name="properties[${code}]"`).parentElement.classList.add("_focus")
			 form.querySelector(`input[name="properties[${code}]"`).classList.add("_focus")
			 form.querySelector(`input[name="properties[${code}]"`).value = p.innerText
				
		});
		
	})
}


async function logout() {
	await fetch(`/?logout=yes&sessid=${window.BX.bitrix_sessid()}`, {
		"body": null,
		"method": "GET",
	});
	window.location = "/"
}

async function deleteAddress(node) {
	let body = new FormData()
	let container = node.closest('.js-address')
	body.append('sessid', window.BX.bitrix_sessid())
	body.append('profileId', parseInt(container.dataset.profileId))
	let getParams = `?mode=class&c=<?=$this->__component->getName()?>&action=deleteProfile`

	let res = await fetch(
		"/bitrix/services/main/ajax.php" + getParams,
		{
			method: "POST",
			body,
		}
	).then(r => r.json())

	if (res.status === "error") {
		console.log(res.errors);
	} else {
		container.remove()
	}
}

</script>