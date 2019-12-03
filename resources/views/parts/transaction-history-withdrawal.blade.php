<div class="row played">
	<div class="col-xs-12 field-left padding-none">
		<div class="inner-addon right-addon mobile-no-margin">
			<div style="text-align:left" class="jq_withdraw_head">
				@if(isset($date_from))
					<span class="jq_trans_date_beetwen">{{ __('Денежные операции')}} <i>{{ $date_from }} </i>  - <i> {{ $date_to }}</i></span>
				@else
					<span class="jq_trans_date_beetwen">{{ __('Денежные операции')}} <i>@php echo date('Y-m-d', strtotime(' -1 month')) @endphp</i>  - <i> @php echo date('Y-m-d') @endphp</i></span>
				@endif
				<input type="text" id="datepicker_withdrawal" value="@php echo date('Y-m-d') @endphp" class="history_datepicker" placeholder="{{ __('Месяц')}}"> <span class="jq_new_transactions">{{ __('Найти')}}</span>
			</div>
		</div>
	</div>
</div>
<div class="row mobile-no-margin">
	<div class="col-xs-11 col-sm-12 text-left padding-none jq_hisory_trans_table">
		<div id="data-div">
			<table>
				<thead>
					<tr>
						<th>{{ __('Дата')}}</th>
						<th>{{ __('Тип')}}</th>
						<th>{{ __('Кол-во')}}</th>
						<th>{{ __('Описание')}}</th>
					</tr>
				</thead>
				<tbody id="data-table-withdraw" class="jq_withdraw_table_body">
					@if(isset($transactions) && $transactions != '')
						@if(is_array($transactions->transactions->transaction))
							@foreach($transactions->transactions->transaction as $transaction)
								@if($transaction->type == 'WITHDRAWAL')
									@php $time = str_replace('[UTC]', '',$transaction->lastUpdatedAt) @endphp
									<tr>
										<td class="jq_date_convert" data-time="{{$time}}"> {{ Carbon\Carbon::parse($time)->format('Y/m/d H:i') }}</td>
										<td>{{ $transaction->type }}</td>
										<td>{{ $transaction->creditedAmount }}</td>
										<td>{{ $transaction->psp }}</td>
									</tr>
								@endif
							@endforeach
						@else
							@if($transactions->transactions->transaction->type == 'WITHDRAWAL')
								@php $time = str_replace('[UTC]', '',$transactions->transactions->transaction->lastUpdatedAt) @endphp
								<tr>
									<td class="jq_date_convert" data-time="{{$time}}"> {{ Carbon\Carbon::parse($time)->format('Y/m/d H:i') }}</td>
									<td>{{ $transactions->transactions->transaction->type }}</td>
									<td>{{ $transactions->transactions->transaction->creditedAmount }}</td>
									<td>{{ $transactions->transactions->transaction->psp }}</td>
								</tr>
							@endif
						@endif
					@endif
				</tbody>
			</table>
			<div class="divider" style="margin:9px 0px 16px 0px"></div>
			<div style="margin-top:2px" class="jq_withdraw_pagin">
				@if(isset($transactions) && $transactions != '')
					<div id="data-showing" class="jq_data_showing" style="float:left"><span>{{ __('Показано')}} {{ count($transactions->transactions->transaction) }} {{ __('из')}} {{ $transactions->txCount }} {{ __('операций')}}</span></div>
					<nav class="transac_pagination" style="float:right" data-page_count="{{ $transactions->pagesCount }}">
						<ul id="pagination-history" class="pagination"></ul>
					</nav>
				@endif
			</div>
		</div>
		<div id="loading-data-pc" style="display: none;"></div>
	</div>
</div>