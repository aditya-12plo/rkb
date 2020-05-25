<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRealAccountUser extends Model
{

    protected $table = 'vw_real_account_users';
    protected $primaryKey = 'id';
    protected $fillable = array('user_id','email','admin_id','admin_email','admin_name','aggrement_see_company_profile',
	'disclosure_statement',
    'name','place_of_birth','date_of_birth','account_number','type_of_identity_card','identity_card_number',
    'country','province','city','area','sub_area','village','address','postal_code','aggrement_simulation_commodity_trade_transaction',
    'name_implementing_commodity_trade_transaction','aggrement_implementing_commodity_trade_transaction',
    'customer_code','tax_number','gander','marital_status','name_husband_or_wife','mother_name',
    'phone','phone_house','fax_house','house_status','purpose_open_account','investment_experience',
    'bappebti_family','bankruptcy_by_court',
    'emergency_name','emergency_address','emergency_postal_code','emergency_phone','emergency_relationship',
    'job_category','job_company','business_fields','job_position','job_length_of_work','job_length_of_work_before',
    'job_address','job_postal_code','job_phone','job_fax',
    'wealth_list_price','wealth_list_house_address','wealth_list_njop','wealth_list_bank_deposit','wealth_list_bank_others',
    'bank_margin_name','bank_margin_branch','bank_margin_number','bank_margin_phone','bank_margin_type',
    'bank_margin_name_2','bank_margin_branch_2','bank_margin_number_2','bank_margin_phone_2','bank_margin_type_2',
    'image_profile','image_bank','image_electricity','image_other','image_other_2','image_identity','aggrement_statement_of_truth_and_responsibility',
    'aggrement_notice_of_risk','disputes_through','aggrement_electronic_authorization','aggrement_trading_rules','aggrement_personal_access_password',
    'access_code','form_number','status','created_at','updated_at');
    public $timestamps = false;
   
}
