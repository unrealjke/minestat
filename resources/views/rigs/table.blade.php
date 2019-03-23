<table class="table table-responsive" id="rigs-table">
    <thead>
        <tr>
            <th>On</th>
            <th>Kernel</th>
            <th>Name</th>
            <th>Loc</th>
            <th>IP</th>
            <th>CPU t</th>
            <th>Up Time</th>
            <th>Free Space</th>
            <th><a href="#" data-placement="bottom" data-tooltip="tooltip" data-toggle="tooltip" data-original-title="Total hashrate" >Hr</a></th>
            <th>Hashes</th>
            <th>Temps</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rigs as $rig)
        <tr>
            <td><i class="fa fa-fw fa-power-off {!! $rig->state->off ? 'text-red' : 'text-green' !!}"></i></td>
            <td>{!! $rig->kernel !!}</td>
            <td>{!! $rig->hostname !!}</td>
            <td>{!! $rig->rack_loc !!}</td>
            <td>{!! $rig->ip !!}</td>
            <td>{!! $rig->state->cpu_temp !!}</td>
            <td>{!! $rig->state->uptime !!}</td>
            <td>{!! $rig->state->freespace !!}</td>
            <td>{!! $rig->state->hash !!}</td>
            <td>{!! implode('|', $rig->state->miner_hashes) !!}</td>
            <td>{!! implode('|', $rig->state->temp) !!}</td>
            <td>
                {!! Form::open(['route' => ['rigs.destroy', $rig->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rigs.show', [$rig->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rigs.edit', [$rig->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
