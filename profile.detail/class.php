<?
use Bitrix\Main\Engine\ActionFilter\Authentication;
use Bitrix\Main\Engine\ActionFilter\Csrf;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader;

class NerozProfileDetailComponent extends CBitrixComponent implements Controllerable, Errorable {
	/** @var ErrorCollection */
	public $errorCollection;

	public $orderProperties;
	public $userProfiles;
	public $userProfileProps;

	public function onPrepareComponentParams($arParams) {
		$this->errorCollection = new ErrorCollection();

		$arParams["CACHE_TIME"] = $arParams["CACHE_TIME"]? intval($arParams["CACHE_TIME"]) : 36000000;
		return $arParams;
	}


	public function executeComponent() {
		$this->arResult = [];

		CJSCore::Init([
			"mk_global_events",
			"mk_ajax_forms"
		]);

		if ($this->StartResultCache()){
			if(!Loader::IncludeModule("sale")){
				$this->AbortResultCache();
				ShowError("Модуль каталога не установлен");
				return;
			}

			$user = \Bitrix\Main\UserTable::getById($GLOBALS['USER']->GetId())->fetchObject();

			$this->arResult["NAME"] = $user->getLastName() . " " . $user->getName() . " " . $user->getSecondName();
			$this->arResult["EMAIL"] = $user->getEmail();
			$this->arResult["PHONE"] = $user->getPersonalPhone();
			$this->arResult["WORK_COMPANY"] = $user->getWorkCompany();
			if (null !== $user->getPersonalBirthday()) {
				$this->arResult["BIRTHDAY"] = $user->getPersonalBirthday()->format("j.m.Y"); 
			} else {
				$this->arResult["BIRTHDAY"] = ""; 
			}
			$this->getUserProps();
			$this->fillPropsToResult();


			$this->IncludeComponentTemplate();
			// $this->EndResultCache();
		}
	}

	public function fillPropsToResult() {
		$this->arResult["PROFILE_PROPERTIES"] = [];

		foreach ($this->orderProperties as $op) {
			$arOp = $op->collectValues();
			$arOp['VALUES'] = [];

			foreach ($this->userProfiles as $profile) {
				foreach ($this->userProfileProps as $prop) {
					if ($prop->getUserPropsId() != $profile->getId()) {
						continue;
					}

					if ($prop->getOrderPropsId()  != $arOp['ID']) {
						continue;
					}

					$arOp['VALUES'][$profile->getId()] = $prop->collectValues();
				}
			}

			$this->arResult["PROFILE_PROPERTIES"][] = $arOp;
		}

		$this->arResult["PROFILES"] = [];
		foreach ($this->userProfiles as $profile) {
			$this->arResult["PROFILES"][] = $profile->collectValues();
		}
	}

	public function getUserProps() {
		if(!Loader::IncludeModule("sale")){
			new Error("Модуль каталога не установлен");
			return;
		}

		$this->orderProperties = \Bitrix\Sale\Property::getList([
			'filter' => [
				// "IS_ADDRESS" => "Y",
				"ACTIVE" => "Y",
			]
		])->fetchCollection();


		$this->userProfiles = Bitrix\Sale\Internals\UserPropsTable::getList([
			"filter" => ['USER_ID' => $GLOBALS["USER"]->GetId()],
			"order" => ['DATE_UPDATE' => 'desc'],
		])->fetchCollection();

		$userProfilesIds = $this->userProfiles->getIdList();

		$this->userProfileProps = \Bitrix\Sale\Internals\UserPropsValueTable::getList([
			'filter' => [
				// 'ORDER_PROPS_ID' => $addressPropsIds,
				'USER_PROPS_ID' => $userProfilesIds,
			]
		])->fetchCollection();
	}

	/**
	 * ajax/fetch configuration
	 * @return array
	 */
	public function configureActions(): array {
		return [
			'updateName' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'updateEmail' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'updateCompany' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'updatePhone' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'updateProfile' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'changePassword' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'addProfile' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'deleteProfile' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
			'profileSetDefault' => [
				'prefilters' => [
					new Csrf(),
					new Authentication(),
				],
			],
		];
	}

	public function profileSetDefaultAction (int $ID) {
		$this->getUserProps();

		$profile = $this->userProfiles->getByPrimary($ID);
		if (is_null($profile)) {
			$this->errorCollection[] = new Error("Не удалось найти профиль для изменения");
			return;
		}
		$profile->setDateUpdate(new Bitrix\Main\Type\DateTime());
		$profile->save();
	}


	public function updatePhoneAction (string $phone) {
		$user = new CUser;

		$res = $user->Update($GLOBALS['USER']->GetId(), [
			"PERSONAL_PHONE" => htmlspecialchars($phone),
		]);
		if (!$res) {
			$this->errorCollection[] = new Error($user->LAST_ERROR);
		}
	}
	public function updateEmailAction (string $email) {		
		$user = new CUser;

		$res = $user->Update($GLOBALS['USER']->GetId(), [
			"EMAIL" => htmlspecialchars($email),
		]);

		if (!$res) {
			$this->errorCollection[] = new Error($user->LAST_ERROR);
		}
	}
	public function updateCompanyAction (string $сompany) {		
		$user = new CUser;

		$res = $user->Update($GLOBALS['USER']->GetId(), [
			"WORK_COMPANY" => htmlspecialchars($сompany),
		]);

		if (!$res) {
			$this->errorCollection[] = new Error($user->LAST_ERROR);
		}
	}
	public function updateNameAction (string $name) {
		
		$user = new CUser;

		$separation = explode(' ', $name);

		$res = $user->Update($GLOBALS['USER']->GetId(), [
			"NAME" => htmlspecialchars($separation[1]),
			"LAST_NAME" => htmlspecialchars($separation[0]),
			"SECOND_NAME" => htmlspecialchars($separation[2]),
		]);

		if (!$res) {
			$this->errorCollection[] = new Error($user->LAST_ERROR);
		}
	}

	public function updateProfileAction(int $profileId, array $properties) {
		$this->getUserProps();

		$profile = $this->userProfiles->getByPrimary($profileId);
		if (is_null($profile)) {
			$this->errorCollection[] = new Error("Не удалось найти профиль для изменения");
			return;
		}

		foreach ($properties as $key => $value) {
			foreach ($this->orderProperties as $orderProp) {
				if ($orderProp->getCode() !== $key) {
					continue;
				}
				$set = false;
				foreach ($this->userProfileProps as $userProps) {
					if ($userProps->getUserPropsId() != $profileId || $userProps->getOrderPropsId() != $orderProp->getId()) {
						continue;
					}

					$userProps['VALUE'] = $value;
					$set = true;
				}
				if (!$set) {
					$newProp = \Bitrix\Sale\Internals\UserPropsValueTable::createObject();
					$newProp['USER_PROPS_ID'] = $profileId;
					$newProp['ORDER_PROPS_ID'] = $orderProp->getId();
					$newProp['NAME'] = $orderProp->getName();
					$newProp['VALUE'] = $value;
					$newProp->save();
				}

				if ($orderProp["IS_PROFILE_NAME"] && strlen($value)) {
					$profile["NAME"] = $value;
					$profile->save();
				}
			}
		}

		$this->userProfileProps->save();
	}

	public function addProfileAction(array $properties,  int $typepayer) {
		$this->getUserProps();

		$newProfile = Bitrix\Sale\Internals\UserPropsTable::createObject();
		$newProfile["NAME"] = "Новый профиль из лк";
		$newProfile["USER_ID"] = $GLOBALS["USER"]->GetId();
		$newProfile["PERSON_TYPE_ID"] = $typepayer;
		$newProfile["DATE_UPDATE"] = new Bitrix\Main\Type\DateTime();
		$newProfile->save();

		try {
			foreach ($properties as $key => $value) {
				foreach ($this->orderProperties as $orderProp) {
					if ($orderProp->getPersonTypeId() != $typepayer) {
						continue;
					}

					if ($orderProp->getCode() !== $key) {
						continue;
					}

					if ($orderProp["IS_PROFILE_NAME"] && strlen($value)) {
						$newProfile["NAME"] = $value;
						$newProfile->save();
					}

					$newProp = \Bitrix\Sale\Internals\UserPropsValueTable::createObject();
					$newProp['USER_PROPS_ID'] = $newProfile["ID"];
					$newProp['ORDER_PROPS_ID'] = $orderProp->getId();
					$newProp['NAME'] = $orderProp->getName();
					$newProp['VALUE'] = $value;
					$newProp->save();
				}
			}
		} catch (\Throwable $th) {
			$this->deleteProfileAction((int) $newProfile["ID"]);
			throw $th;
		}

		return [
			// "prop" => $newProp->collectValues(),
			"profile" => $newProfile->collectValues()
		];
	}

	public function deleteProfileAction(int $profileId) {
		$this->getUserProps();

		foreach ($this->userProfileProps as $prop) {
			if ($prop->getUserPropsId() == $profileId) {
				$prop->delete();
			}
		}

		$this->userProfiles->getByPrimary($profileId)->delete();

		return "Профиль удален";
	}


	public function changePasswordAction(string $password) {
		$user = new CUser;

		$res = $user->Update($GLOBALS['USER']->GetId(), [
			"PASSWORD" => $password,
			"CONFIRM_PASSWORD" => $password,
		]);

		if (!$res) {
			$this->errorCollection[] = new Error($user->LAST_ERROR);
		}
	}

	/**
	* Getting array of errors.
	* @return Error[]
	*/
	public function getErrors() {
		return $this->errorCollection->toArray();
	}

	/**
	 * Getting once error with the necessary code.
	 * @param string $code Code of error.
	 * @return Error
	 */
	public function getErrorByCode($code) {
		return $this->errorCollection->getErrorByCode($code);
	}
}