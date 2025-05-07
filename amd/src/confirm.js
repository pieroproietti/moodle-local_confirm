import ModalFactory from 'core/modal_factory';
import ModalEvents from 'core/modal_events';
import Notification from 'core/notification';
import Ajax from 'core/ajax';
import * as Str from 'core/str';
import $ from 'jquery';

export const init = async (user) => {
    const [welcome, confirm, modify, save, deptLabel, posLabel] = await Str.get_strings([
        {key: 'welcome', component: 'local_confirm'},
        {key: 'confirm', component: 'local_confirm'},
        {key: 'modify', component: 'local_confirm'},
        {key: 'save', component: 'local_confirm'},
        {key: 'department', component: 'local_confirm'},
        {key: 'position', component: 'local_confirm'}
    ]);

    const departments = ['amministrazione', 'istruzione', 'altro'];
    const positions = ['insegnante', 'bidello', 'studente'];

    const content = `
        <div class="local-confirm-modal">
            <p><strong>${user.username}</strong> - ${user.firstname} ${user.lastname}</p>
            <div class="form-group">
                <label for="department-select">${deptLabel}</label>
                <select id="department-select" class="form-control">
                    ${departments.map(d => `<option value="${d}" ${user.department === d ? 'selected' : ''}>${d}</option>`).join('')}
                </select>
            </div>
            <div class="form-group">
                <label for="position-select">${posLabel}</label>
                <select id="position-select" class="form-control">
                    ${positions.map(p => `<option value="${p}" ${user.position === p ? 'selected' : ''}>${p}</option>`).join('')}
                </select>
            </div>
        </div>
    `;

    try {
        const modal = await ModalFactory.create({
            title: welcome,
            body: content,
            type: ModalFactory.types.SAVE_CANCEL,
            large: true,
            buttons: {
                save,
                cancel: confirm
            }
        });

        modal.getRoot().on(ModalEvents.save, async (e) => {
            const department = $('#department-select').val();
            const position = $('#position-select').val();

            try {
                await Ajax.call([{
                    methodname: 'local_confirm_update_user',
                    args: {
                        userid: user.id,
                        department,
                        position
                    }
                }])[0];

                modal.hide();
            } catch (err) {
                Notification.exception(err);
            }
        });

        modal.getRoot().on(ModalEvents.hidden, (e) => {
            if (!window.localStorage.getItem('local_confirm_confirmed')) {
                modal.show();
            }
        });

        modal.getRoot().on(ModalEvents.cancel, () => {
            window.localStorage.setItem('local_confirm_confirmed', '1');
            modal.hide();
        });

        modal.show();
    } catch (err) {
        Notification.exception(err);
    }
};
