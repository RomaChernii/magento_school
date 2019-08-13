/**
 * Lebed SecondHomeModule button alert
 *
 * @category  Lebed
 * @package   Lebed\SecondHomeModule
 * @author    Tetiana Lebed <teleb@smile.fr>
 * @copyright 2019 Smile
 */

define(
    [
        'jquery',
        'Magento_Ui/js/modal/confirm',
        'mage/translate'
    ],
    function(
        $,
        confirm,
        $t
    ) {
        'use strict';

        return function (config, element) {
            $(element).bind('click', function () {
                var self = $(this);

                confirm({
                    title: config.title,
                    content: self.attr('data-content'),
                    modalType: 'alert-modal',
                    actions: {
                        confirm: function () {
                            location.href = self.attr('data-url');
                        }
                    },
                    buttons: [
                        {
                            text: $t('Cancel'),
                            class: 'action-secondary action-dismiss',
                            click: function (event) {
                                this.closeModal(event);
                            }
                        },
                        {
                            text: $t('Ok'),
                            class: 'action-primary action-accept',
                            click: function (event) {
                                this.closeModal(event, true);
                            }
                        }
                    ]
                });
            });
        }
    }
);
