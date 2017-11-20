<template>
    <div class="uk-form uk-form-horizontal">
        <h1>{{ 'Shariff Settings' | trans }}</h1>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Insert Shariff automatically' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <input type="checkbox" v-model="package.config.autoinsert">
            </div>
        </div>
        <div class="uk-form-row" v-if="package.config.autoinsert">
            <label class="uk-form-label">{{ 'Pages' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <input-tree :active.sync="package.config.nodes"></input-tree>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Position' | trans }}</label>
            <div class="uk-form-controls">
                <select class="uk-form-large" v-model="package.config.position">
                    <option value="top">{{ 'Top' | trans }}</option>
                    <option value="bottom">{{ 'Bottom' | trans }}</option>
                </select>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Orientation' | trans }}</label>
            <div class="uk-form-controls">
                <select class="uk-form-large" v-model="package.config.orientation">
                    <option value="horizontal">{{ 'Horizontal' | trans }}</option>
                    <option value="vertical">{{ 'Vertical' | trans }}</option>
                </select>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Theme' | trans }}</label>
            <div class="uk-form-controls">
                <select class="uk-form-large" v-model="package.config.theme">
                    <option value="standard">{{ 'Standard' | trans }}</option>
                    <option value="grey">{{ 'Grey' | trans }}</option>
                    <option value="white">{{ 'White' | trans }}</option>
                </select>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Localisation' | trans }}</label>
            <div class="uk-form-controls">
                <select class="uk-form-large" v-model="package.config.lang">
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
            <span class="uk-form-label">{{ 'Services' | trans }}</span>
            <div class="uk-form-controls uk-form-controls-text">
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.facebook"> {{ 'Facebook' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.twitter"> {{ 'Twitter' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.googleplus"> {{ 'Google Plus' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.linkedin"> {{ 'LinkedIn' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="package.config.services.pinterest"> {{ 'Pinterest' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="package.config.services.xing"> {{ 'Xing' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.addthis"> {{ 'Add This' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.tumblr"> {{ 'Tumblr' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.flattr"> {{ 'Flattr' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.diaspora"> {{ 'Diaspora' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.reddit"> {{ 'Reddit' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.stumbleupon"> {{ 'Stumbleupon' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="package.config.services.weibo"> {{ 'Weibo' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.tencent_weibo"> {{ 'Tencent Weibo' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="package.config.services.qzone"> {{ 'Qzone' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.whatsapp"> {{ 'WhatsApp' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox"
                                  v-model="package.config.services.threema"> {{ 'Threema' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="package.config.services.mail"> {{ 'Mail' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="package.config.services.print"> {{ 'Print' | trans }}</label>
                </p>
                <p class="uk-form-controls-condensed">
                    <label><input type="checkbox" v-model="package.config.services.info"> {{ 'Info' | trans }}</label>
                </p>
            </div>
        </div>
        <div v-if="package.config.services.flattr">
            <div class="uk-form-row">
                <label class="uk-form-label">{{ 'Flattr category' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-form-controls-condensed">
                        <input type="text" class="uk-form-width-large" v-model="package.config.flattr_category">
                    </p>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">{{ 'Flattr user' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-form-controls-condensed">
                        <input type="text" class="uk-form-width-large" v-model="package.config.flattr_user">
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label">{{ 'Enable Backend' | trans }}</label>
            <div class="uk-form-controls uk-form-controls-text">
                <input type="checkbox" v-model="package.config.backend">
            </div>
        </div>
        <div v-if="package.config.backend">
            <div class="uk-form-row">
                <label class="uk-form-label">{{ 'Cache TTL' | trans }}</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-small uk-text-right" type="number"
                           v-model="package.config.ttl" min="0" number>
                </div>
            </div>
            <div v-if="package.config.services.facebook">
                <div class="uk-form-row">
                    <label class="uk-form-label">{{ 'Facebook App ID' | trans }}</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <input type="text" class="uk-form-width-large" v-model="package.config.facebook_api.app_id">
                        </p>
                    </div>
                </div>
                <div class="uk-form-row">
                    <span class="uk-form-label">{{ 'Secret' | trans }}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <div class="uk-form-password">
                            <p class="uk-form-controls-condensed">
                                <input class="uk-form-password uk-form-width-large"
                                       type="password"
                                       name="secret"
                                       autocomplete="off"
                                       v-model="package.config.facebook_api.secret"> <a class="uk-form-password-toggle"
                                                                                        href=""
                                                                                        data-uk-form-password="{ lblShow: 'Show', lblHide: 'Hide' }">{{ 'Show' | trans }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-form-row uk-margin-top">
            <div class="uk-form-controls">
                <button class="uk-button uk-button-primary"
                @click="save">{{ 'Save' | trans }}
            </button>
        </div>
    </div>
</div>
        </template>

<script>

module.exports = {

	settings: true,

	props: ['package'],

	methods: {
		save: function save () {
			this.$http.post ('admin/system/settings/config', {
				name: 'spqr/shariff',
				config: this.package.config
			}).then (function () {
				this.$notify ('Settings saved.', '');
			}).catch (function (response) {
				this.$notify (response.message, 'danger');
			}).finally (function () {
				this.$parent.close ();
			});
		}
	}
};

window.Extensions.components['shariff-settings'] = module.exports;
</script>