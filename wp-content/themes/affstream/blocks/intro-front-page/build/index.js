(() => {
	"use strict";
	var r, e = {
		250: () => {
			const r = window.wp.blocks, e = window.React, o = window.wp.i18n, t = window.wp.blockEditor,
				n = JSON.parse('{"u2":"create-block/intro-front-page"}');
			(0, r.registerBlockType)(n.u2, {
				edit: function () {
					return (0, e.createElement)("p", {...(0, t.useBlockProps)()}, (0, o.__)("Intro Front Page – hello from the editor!", "intro-front-page"))
				}, save: function () {
					return (0, e.createElement)("p", {...t.useBlockProps.save()}, "Intro Front Page – hello from the saved content!")
				}
			})
		}
	}, o = {};

	function t(r) {
		var n = o[r];
		if (void 0 !== n) return n.exports;
		var a = o[r] = {exports: {}};
		return e[r](a, a.exports, t), a.exports
	}

	t.m = e, r = [], t.O = (e, o, n, a) => {
		if (!o) {
			var i = 1 / 0;
			for (c = 0; c < r.length; c++) {
				for (var [o, n, a] = r[c], l = !0, p = 0; p < o.length; p++) (!1 & a || i >= a) && Object.keys(t.O).every((r => t.O[r](o[p]))) ? o.splice(p--, 1) : (l = !1, a < i && (i = a));
				if (l) {
					r.splice(c--, 1);
					var s = n();
					void 0 !== s && (e = s)
				}
			}
			return e
		}
		a = a || 0;
		for (var c = r.length; c > 0 && r[c - 1][2] > a; c--) r[c] = r[c - 1];
		r[c] = [o, n, a]
	}, t.o = (r, e) => Object.prototype.hasOwnProperty.call(r, e), (() => {
		var r = {826: 0, 431: 0};
		t.O.j = e => 0 === r[e];
		var e = (e, o) => {
			var n, a, [i, l, p] = o, s = 0;
			if (i.some((e => 0 !== r[e]))) {
				for (n in l) t.o(l, n) && (t.m[n] = l[n]);
				if (p) var c = p(t)
			}
			for (e && e(o); s < i.length; s++) a = i[s], t.o(r, a) && r[a] && r[a][0](), r[a] = 0;
			return t.O(c)
		}, o = globalThis.webpackChunkintro_front_page = globalThis.webpackChunkintro_front_page || [];
		o.forEach(e.bind(null, 0)), o.push = e.bind(null, o.push.bind(o))
	})();
	var n = t.O(void 0, [431], (() => t(250)));
	n = t.O(n)
})();
