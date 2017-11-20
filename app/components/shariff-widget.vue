<template>
    <div class="uk-grid pk-grid-large pk-width-sidebar-large" data-uk-grid-margin>
        <div class="pk-width-content uk-form-horizontal">
            <div class="uk-form-row">
                <label for="form-title" class="uk-form-label">{{ 'Title' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-title" class="uk-form-width-large" type="text" name="title" v-model="widget.title"
                           v-validate:required>
                    <p class="uk-form-help-block uk-text-danger"
                       v-show="form.title.invalid">{{ 'Title cannot be blank.' | trans }}</p>
                </div>
            </div>
            <div class="uk-form-row">
                <label for="form-overwrite-orientation"
                       class="uk-form-label">{{ 'Overwrite Orientation' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <input id="form-overwrite-orientation" type="checkbox" v-model="widget.data.overwrite_orientation">
                </div>
            </div>
            <div class="uk-form-row" v-if="widget.data.overwrite_orientation">
                <label class="uk-form-label">{{ 'Orientation' | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-form-large" v-model="widget.data.orientation">
                        <option value="horizontal">{{ 'Horizontal' | trans }}</option>
                        <option value="vertical">{{ 'Vertical' | trans }}</option>
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label for="form-overwrite-theme" class="uk-form-label">{{ 'Overwrite Theme' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <input id="form-overwrite-theme" type="checkbox" v-model="widget.data.overwrite_theme">
                </div>
            </div>
            <div class="uk-form-row" v-if="widget.data.overwrite_theme">
                <label class="uk-form-label">{{ 'Theme' | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-form-large" v-model="widget.data.theme">
                        <option value="standard">{{ 'Standard' | trans }}</option>
                        <option value="grey">{{ 'Grey' | trans }}</option>
                        <option value="white">{{ 'White' | trans }}</option>
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label for="form-overwrite-lang" class="uk-form-label">{{ 'Overwrite Language' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <input id="form-overwrite-lang" type="checkbox" v-model="widget.data.overwrite_lang">
                </div>
            </div>
            <div class="uk-form-row" v-if="widget.data.overwrite_lang">
                <label class="uk-form-label">{{ 'Localisation' | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-form-large" v-model="widget.data.lang">
                        <option value="bg">{{ 'Bulgarian' | trans }}</option>
                        <option value="de">{{ 'German' | trans }}</option>
                        <option value="en">{{ 'English' | trans }}</option>
                        <option value="es">{{ 'Spanish' | trans }}</option>
                        <option value="fi">{{ 'Finnish' | trans }}</option>
                        <option value="hr">{{ 'Croatian' | trans }}</option>
                        <option value="ja">{{ 'Japanese' | trans }}</option>
                        <option value="ko">{{ 'Korean' | trans }}</option>
                        <option value="no">{{ 'Norwegian' | trans }}</option>
                        <option value="pl">{{ 'Polish' | trans }}</option>
                        <option value="pt">{{ 'Portuguese' | trans }}</option>
                        <option value="ro">{{ 'Romanian' | trans }}</option>
                        <option value="ru">{{ 'Russian' | trans }}</option>
                        <option value="sk">{{ 'Slovakian' | trans }}</option>
                        <option value="sl">{{ 'Slovenian' | trans }}</option>
                        <option value="sr">{{ 'Serbian' | trans }}</option>
                        <option value="sv">{{ 'Swedish' | trans }}</option>
                        <option value="tr">{{ 'Turkish' | trans }}</option>
                        <option value="zh">{{ 'Chinese' | trans }}</option>
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label for="form-overwrite-services" class="uk-form-label">{{ 'Overwrite Services' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <input id="form-overwrite-services" type="checkbox" v-model="widget.data.overwrite_services">
                </div>
            </div>
            <div class="uk-form-row" v-if="widget.data.overwrite_services">
                <span class="uk-form-label">{{ 'Services' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.facebook"> {{ 'Facebook' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.twitter"> {{ 'Twitter' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.googleplus"> {{ 'Google Plus' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.linkedin"> {{ 'LinkedIn' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.pinterest"> {{ 'Pinterest' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox" v-model="widget.data.services.xing"> {{ 'Xing' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.addthis"> {{ 'Add This' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.tumblr"> {{ 'Tumblr' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.flattr"> {{ 'Flattr' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.diaspora"> {{ 'Diaspora' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.reddit"> {{ 'Reddit' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.stumbleupon"> {{ 'Stumbleupon' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.weibo"> {{ 'Weibo' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.tencent_weibo"> {{ 'Tencent Weibo' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.qzone"> {{ 'Qzone' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.whatsapp"> {{ 'WhatsApp' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.threema"> {{ 'Threema' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox" v-model="widget.data.services.mail"> {{ 'Mail' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox"
                                      v-model="widget.data.services.print"> {{ 'Print' | trans }}</label>
                    </p>
                    <p class="uk-form-controls-condensed">
                        <label><input type="checkbox" v-model="widget.data.services.info"> {{ 'Info' | trans }}</label>
                    </p>
                </div>
            </div>
            <div v-if="widget.data.overwrite_services">
                <div v-if="widget.data.services.flattr">
                    <div class="uk-form-row">
                        <label class="uk-form-label">{{ 'Flattr category' | trans }}</label>
                        <div class="uk-form-controls uk-form-controls-text">
                            <p class="uk-form-controls-condensed">
                                <input type="text" class="uk-form-width-large" v-model="widget.data.flattr_category">
                            </p>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label">{{ 'Flattr user' | trans }}</label>
                        <div class="uk-form-controls uk-form-controls-text">
                            <p class="uk-form-controls-condensed">
                                <input type="text" class="uk-form-width-large" v-model="widget.data.flattr_user">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-form-row">
                <label for="form-overwrite-orientation" class="uk-form-label">{{ 'Overwrite Backend' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <input id="form-overwrite-backend" type="checkbox" v-model="widget.data.overwrite_backend">
                </div>
            </div>
            <div class="uk-form-row" v-if="widget.data.overwrite_backend">
                <label class="uk-form-label">{{ 'Enable Backend' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <input type="checkbox" v-model="widget.data.backend">
                </div>
            </div>
        </div>
        <div class="pk-width-sidebar">
            <partial name="settings"></partial>
        </div>
    </div>
</template>

<script>
module.exports = {
	section: {
		label: 'Settings'
	},
	replace: false,
	props: ['widget', 'config', 'form'],
	data () {
		return {}
	},
	created () {
		this.$options.partials = this.$parent.$options.partials;
		this.$set ('widget.data', _.merge ({
			overwrite_orientation: false,
			overwrite_theme: false,
			overwrite_lang: false,
			overwrite_services: false,
			overwrite_backend: false,
			orientation: 'horizontal',
			theme: 'standard',
			lang: 'en',
			flattr_category: '',
			flattr_user: '',
			backend: false,
			services: {
				facebook: true,
				twitter: true,
				googleplus: false,
				linkedin: false,
				pinterest: false,
				xing: false,
				addthis: false,
				tumblr: false,
				flattr: false,
				diaspora: false,
				reddit: false,
				stumbleupon: false,
				weibo: false,
				tencent_weibo: false,
				qzone: false,
				whatsapp: false,
				threema: false,
				mail: false,
				info: true
			}
		}, this.widget.data));
	}
};
window.Widgets.components['spqr-shariff:settings'] = module.exports;
</script>