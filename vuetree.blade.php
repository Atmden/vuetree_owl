@yield('before.panel')

<div class="panel panel-default {!! $panel_class !!}">
    <div class="panel-heading">
        @if ($creatable)
            <a class="btn btn-primary" href="{{ $createUrl }}">
                <i class="fa fa-plus"></i> {{ $newEntryButtonText }}
            </a>
        @endif
        @yield('panel.buttons')
        <div class="pull-right">
            @yield('panel.heading.actions')
        </div>
    </div>
    @yield('panel.heading')
    <div class="panel-body">
        <vuetree inline-template :edit-url="'{{ $editUrl }}'">
            <div class="col">
                <a href="#" class="btn-sm btn-info" @click="collapseAll">Раскрыть весь список</a>
                <a href="#" class="btn-sm btn-info" @click="expandAll">Свернуть весь список</a>
                <v-treeview
                        ref="treereferals"
                        :items="{{ $items }}"
                        return-object
                        item-key="id"
                        rounded
                        hoverable
                        transition
                        activatable
                >
                    <template slot="prepend" slot-scope="{ item, open}">
                        <v-icon>
                            mdi-account
                        </v-icon>
                    </template>
                    <template slot="label" slot-scope="{item}">
                        @{{ item.id }} @{{ item.family }} @{{ item.fname }} @{{ item.fathername }}
                        <div class="pull-right" style="margin-right: 10px;">
                            <a :href=editUrl+item.id+'/edit' class="btn-xs btn-success">{{ $editText }}</a>
                        </div>
                    </template>
                </v-treeview>
            </div>
        </vuetree>
    </div>
    @yield('panel.footer')
</div>
@yield('after.panel')
