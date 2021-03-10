<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    public $table = 'members';

    public $appends = [
        'group',
        'interested_department',
        'address',
        'dob'
    ];

    const DISABILITY_SELECT = [
        'yes' => 'Yes',
        'no' => 'No'
    ];

    const CURRENCY_SELECT = [
        'nepali' => 'Nepali',
    ];

    const COUNTRY_SELECT = [
        'nepal' => 'Nepal',
    ];

    const CURRENT_COUNTRY_SELECT = [
        'nepal' => 'Nepal',
        'australia' => 'Australia',
        'usa' => 'USA',
    ];

    const IS_PAID_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        // 'date_of_birth',
    ];

    const GENDER_RADIO = [
        'female' => 'Female',
        'male'   => 'Male',
        'other'  => 'Other',
    ];

    const STATUS_SELECT = [
        'active'     => 'Active',
        'suspended'  => 'Suspended',
        'expired'    => 'Expired',
        'terminated' => 'Terminated',
    ];

    const IDENTITY_TYPE_SELECT = [
        'citizenship'      => 'Citizenship',
        'license'          => 'License',
        'passport'         => 'Passport',
        'national_id_card' => 'National Identity Card',
        'voters_id_card'   => 'Voter\'s Identity Card',
    ];

    const HELP_TYPE_SELECT = [
        'yearly'                   => 'Yearly',
        'monthly'                  => 'Monthly',
        'once'                     => 'Once',
        'goods support'            => 'Goods Support',
        'member expansion'         => 'Member Expansion',
        'local government support' => 'Province, District, Local Government Support',
    ];

    const PAYMENT_TYPE_SELECT = [
        'esewa'              => 'e-Sewa',
        'npay'               => 'n-Pay',
        'money transfer'     => 'Money Transfer',
        'cash'               => 'Cash',
        'friends and family' => 'Friends and Family',
        'bank deposit'       => 'Bank Deposit',
        'will pay later'     => 'Will Pay Later',
    ];

    const AVAILABILITY_SELECT = [
        'daily'                    => 'Daily',
        'few times in a week'      => 'Few Times In A Week',
        'few times in a fortnight' => 'Few Times In A FortNight',
        'few times in a months'    => 'Few Times In A Month',
        'not decided yet'          => 'Not Decided Yet',
        'cannot give time'         => 'Cannot Give Time',
    ];

    const MEMBERSHIP_PERIOD = [
        '1 Year' => '1 Year',
        '2 Years' => '2 Years',
        '3 Years' => '3 Years',
        '4 Years' => '4 Years',
        '5 Years' => '5 Years',
    ];

    const GROUP_SELECT = [
        'women' => 'Women',
        'dalit' => 'Dalit',
        'aadivasi/janajati' => 'Aadivasi/Janajati',
        'Madheshi' => 'Madheshi',
        'Tharu' => 'Tharu',
        'Muslim' => 'Muslim',
        'Backward Area' => 'Backward Area',
        'Khas-Aarya' => 'Khas-Aarya',
    ];

    const OCCUPATION_SELECT = [
        'कृषि' => 'कृषि',
        'मजदुर'  => 'मजदुर',
        'घर-व्यवस्था'  => 'घर-व्यवस्था',
        'उद्यम/व्यापार/सेवा'  => 'उद्यम/व्यापार/सेवा',
        'विद्यार्थी'  => 'विद्यार्थी',
        'वैदेशिक रोजगार'  => 'वैदेशिक रोजगार',
        'बेरोजगार'  => 'बेरोजगार',
        'अन्य पेशा'  => 'अन्य पेशा',

    ];

    const INTERESTED_DEPARTMENT_SELECT = [
        'district' => 'District',
        'province' => 'Province',
        'Local Level' => 'Local Level',
        'Yuva Sangathan' => 'Yuva Sangathan',
        'Mahila Sangathan' => 'Mahila Sangathan',
        'Jestha Naagarik Sangathan' => 'Jestha Naagarik Sangathan',
        'Nothing for now' => 'Nothing for now'
    ];

    const HIGHEST_ACADEMIC_QUALIFICATION = [
        'slc/see' => 'SLC/SEE',
        'hseb' => 'HSEB',
        'bachelors' => 'Bachelors',
        'masters' => 'Masters'
    ];

    const BLOOD_GROUPS_SELECT = [
        'A+'    => 'A positive',
        'A-'    => 'A negative',
        'B+'    => 'B positive',
        'B-'    => 'B negative',
        'O+'    => 'O positive',
        'O-'    => 'O negative',
        'AB+'   => 'AB positive',
        'AB-'   => 'AB negative'
    ];

    protected $fillable = [
        'name',
        'nepali_name',
        'email',
        'group',
        'area_code',
        'blood_group',
        'mobile',
        'gender',
        'status',
        'is_paid',
        'remarks',
        'currency',
        'help_type',
        'help_money',
        'help_goods',
        'deleted_at',
        'created_at',
        'updated_at',
        'disability',
        'occupation',
        'availability',
        'payment_type',
        'payment_confirmation_code',
        'identity_type',
        'date_of_birth',
        'membership_fee',
        'membership_code',
        'identity_number',
        'current_country',
        'area_of_efficiency',
        'interested_department',
        'edit',
        'highest_academic_qualification',
        'identity_image',
        'photo_for_id_card',
        'is_agreed',
        'is_approved',
        'membership_approve_date',
        'year_of_membership_period',
        'form_approve_date',
        'membership_form',
    ];

    public function getRouteKeyName()
    {
        return 'membership_code';
    }

    public function addresses()
    {
        return $this->hasMany('App\MemberAddress', 'member_id', 'id')->with('municipality.district.province');
    }

    public function approveStatus()
    {
        return $this->hasOne(MembersCreateApprove::class, 'member_id', 'membership_code');
    }

    public function formSource()
    {
        return $this->hasOne(FormSource::class, 'form_code', 'membership_code');
    }

    public function getDobAttribute()
    {
        return array_map(function ($item) {
            return (int)$item;
        }, explode("-", $this->attributes['date_of_birth'] ?? '')) ?? null;
    }

    // public function setDateOfBirthAttribute($value)
    // {
    //     $this->attributes['date_of_birth'] = $value ? ($value['year'].'-'.$value['month'].'-'.$value['day']): null ;
    // }

    public function setInterestedDepartmentAttribute($value)
    {
        $this->attributes['interested_department'] = $value ? ((is_array($value) && !empty($value)) ? implode(',', $value) : null) : null;
    }

    public function setGroupAttribute($value)
    {
        $this->attributes['group'] = $value ? implode(',', $value) : null;
    }

    public function getGroupAttribute()
    {
        $group =  collect(explode(',', $this->attributes['group']));
        $group = $group->map(function ($item) {
            if (empty($item)) {
                return null;
            }
            return self::GROUP_SELECT[$item];
        });
        return array_filter($group->toArray());
    }

    public function getInterestedDepartmentAttribute()
    {
        $interested_department =  collect(explode(',', $this->attributes['interested_department']));
        $interested_department = $interested_department->map(function ($item) {
            if (empty($item)) {
                return null;
            }
            return self::INTERESTED_DEPARTMENT_SELECT[$item];
        });
        return array_filter($interested_department->toArray());
    }

    public function getAddressAttribute()
    {
        return (((object)$this->addresses->keyBy('address_type')->map(function ($item, $key) {
            $address = [];
            if ($key == 'permanent' || $key == 'temporary') {
                $address['municipality'] = $item->getRelations()['municipality']->name ?? '';
                $address['district'] = $item->getRelations()['municipality']->district->name ?? '';
                $address['province'] = $item->getRelations()['municipality']->district->province->name ?? '';
                $address['toll_no'] = $item->toll_no ?? '';
                $address['ward_no'] = $item->ward_no ?? '';
                $address['address_type'] = $item->address_type;
            } else {
                $address['municipality'] = $item->municipality_id;
                $address['district'] = $item->district_id;
                $address['province'] = $item->province_id;
                $address['toll_no'] = $item->toll_no;
                $address['ward_no'] = $item->ward_no;
                $address['address_type'] = $item->address_type;
            }
            return (object)($address);
        })));
    }

}
