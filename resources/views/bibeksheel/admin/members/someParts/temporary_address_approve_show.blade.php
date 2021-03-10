@if($addressType == 'foreign' && $editAddressType == 'foreign')
    <tr>
        <th>
            {{ trans('cruds.member.fields.province') }}
        </th>
        <td>
            {{$address->province ?? ''}}
        </td>
        <td>
            {{$editAddress->province ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.district') }}
        </th>
        <td>
            {{$address->district ?? ''}}
        </td>
        <td>
            {{$editAddress->district ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.municipality') }}
        </th>
        <td>
            {{$address->municipality ?? ''}}
        </td>
        <td>
            {{$editAddress->municipality ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.ward_no') }}
        </th>
        <td>
            {{$address->ward_no ?? ''}}
        </td>
        <td>
            {{$editAddress->ward_no ?? ''}}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.member.fields.toll_no') }}
        </th>
        <td>
            {{$address->toll_no ?? ''}}
        </td>
        <td>
            {{$editAddress->toll_no ?? ''}}
        </td>
    </tr>

@else

<tr>
    <td></td>
    //for real 
    @if($addressType == 'foreign')
        <td>
            <table>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.current_country') }}
                    </th>
                    <td>
                        {{$address->province ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.foreign_country_address') }}
                    </th>
                    <td>
                        {{$address->district ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.foreign_country_zip_code') }}
                    </th>
                    <td>
                        {{$address->toll_no ?? ''}}
                    </td>
                </tr>
            </table>
        </td>
    @else
        <td>
            <table>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.province') }}
                    </th>
                    <td>
                        {{$address->province ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.district') }}
                    </th>
                    <td>
                        {{$address->district ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.municipality') }}
                    </th>
                    <td>
                        {{$address->municipality ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.ward_no') }}
                    </th>
                    <td>
                        {{$address->ward_no ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.toll_no') }}
                    </th>
                    <td>
                        {{$address->toll_no ?? ''}}
                    </td>
                </tr>
            </table>
        </td>
    @endif 
        //for edit 
        @if($editAddressType == 'foreign')
        <td>
            <table>

                <tr>
                    <th>
                        {{ trans('cruds.member.fields.current_country') }}
                </th>
                <td>
                    {{$editAddress->province ?? ''}}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.member.fields.foreign_country_address') }}
                </th>
                <td>
                    {{$editAddress->district ?? ''}}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.member.fields.foreign_country_zip_code') }}
                </th>
                <td>
                    {{$editAddress->toll_no ?? ''}}
                </td>
            </tr>
        </table>
        </td>
        @else
        <td>
            <table>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.province') }}
                        
                    </th>
                    <td>
                        {{$editAddress->province ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.district') }}
                    </th>
                    <td>
                        {{$editAddress->district ?? ''}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.member.fields.municipality') }}
                    </th>
                    <td>
                        {{$editAddress->municipality ?? ''}}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.member.fields.ward_no') }}
                </th>
                <td>
                    {{$editAddress->ward_no ?? ''}}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.member.fields.toll_no') }}
                </th>
                <td>
                    {{$editAddress->toll_no ?? ''}}
                </td>
            </tr>
        </table>
        </td>
    @endif
</tr>
@endif